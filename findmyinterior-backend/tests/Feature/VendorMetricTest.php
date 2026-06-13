<?php

namespace Tests\Feature;

use App\Models\Bid;
use App\Models\ContactUnlock;
use App\Models\Requirement;
use App\Models\User;
use App\Models\VendorMetric;
use App\Services\VendorMetricService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendorMetricTest extends TestCase
{
    use RefreshDatabase;

    protected User $vendor;
    protected VendorMetricService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->vendor = User::factory()->create();
        $this->service = app(VendorMetricService::class);
    }

    public function test_records_bid_placement(): void
    {
        $this->service->recordBid($this->vendor->id);

        $this->assertDatabaseHas('vendor_metrics', [
            'vendor_id'  => $this->vendor->id,
            'total_bids' => 1,
        ]);
    }

    public function test_increments_total_bids_multiple_times(): void
    {
        $this->service->recordBid($this->vendor->id);
        $this->service->recordBid($this->vendor->id);
        $this->service->recordBid($this->vendor->id);

        $this->assertDatabaseHas('vendor_metrics', [
            'vendor_id'  => $this->vendor->id,
            'total_bids' => 3,
        ]);
    }

    public function test_records_bid_awarded(): void
    {
        $this->service->recordBid($this->vendor->id);
        $this->service->recordBidAwarded($this->vendor->id);

        $metrics = VendorMetric::where('vendor_id', $this->vendor->id)->first();
        $this->assertEquals(1, $metrics->total_bids);
        $this->assertEquals(1, $metrics->successful_bids);
    }

    public function test_records_project_awarded_and_completed(): void
    {
        $this->service->recordProjectAwarded($this->vendor->id);
        $this->service->recordProjectCompleted($this->vendor->id);

        $metrics = VendorMetric::where('vendor_id', $this->vendor->id)->first();
        $this->assertEquals(1, $metrics->award_count);
        $this->assertEquals(1, $metrics->projects_completed);
        $this->assertEquals(100.0, $metrics->completion_rate);
    }

    public function test_completion_rate_is_zero_with_no_awards(): void
    {
        $this->service->recordBid($this->vendor->id);

        $metrics = VendorMetric::where('vendor_id', $this->vendor->id)->first();
        $this->assertEquals(0.0, $metrics->completion_rate);
    }

    public function test_records_message_received_and_replied(): void
    {
        $this->service->recordMessageReceived($this->vendor->id);
        $this->service->recordMessageReceived($this->vendor->id);
        $this->service->recordMessageReplied($this->vendor->id, 30);

        $metrics = VendorMetric::where('vendor_id', $this->vendor->id)->first();
        $this->assertEquals(2, $metrics->messages_received);
        $this->assertEquals(1, $metrics->messages_replied);
        $this->assertEquals(1, $metrics->response_count);
        $this->assertEquals(30, $metrics->total_response_minutes);
        $this->assertEquals(50.0, $metrics->response_rate);
        $this->assertEquals(30, $metrics->avg_response_minutes);
    }

    public function test_records_contact_unlock(): void
    {
        $this->service->recordContactUnlock($this->vendor->id);

        $this->assertDatabaseHas('vendor_metrics', [
            'vendor_id'    => $this->vendor->id,
            'unlock_count' => 1,
        ]);
    }

    public function test_records_review_and_calculates_rating(): void
    {
        // Below cold-start threshold (< 3 reviews) — returns platform average
        $this->service->recordReview($this->vendor->id, 5);
        $this->service->recordReview($this->vendor->id, 4);
        $metrics = VendorMetric::where('vendor_id', $this->vendor->id)->first();
        $this->assertEquals(4.5, $metrics->rating_average); // cold-start default

        // After 3+ reviews — calculates real average
        $this->service->recordReview($this->vendor->id, 3);
        $metrics->refresh();
        $this->assertEquals(4.0, $metrics->rating_average); // (5+4+3)/3
    }

    public function test_updates_last_active_at(): void
    {
        $this->service->recordBid($this->vendor->id); // triggers updateLastActive internally

        $metrics = VendorMetric::where('vendor_id', $this->vendor->id)->first();
        $this->assertNotNull($metrics->last_active_at);
        $this->assertTrue($metrics->last_active_at->isToday());
    }

    public function test_bid_observer_fires_on_bid_created(): void
    {
        $requirement = Requirement::factory()->create();

        Bid::create([
            'requirement_id'   => $requirement->id,
            'professional_id'  => $this->vendor->id,
            'status'           => 'pending',
            'amount'           => 50000,
            'timeline_days'    => 30,
            'proposal_message' => 'Test bid',
        ]);

        $this->assertDatabaseHas('vendor_metrics', [
            'vendor_id'  => $this->vendor->id,
            'total_bids' => 1,
        ]);
    }
}
