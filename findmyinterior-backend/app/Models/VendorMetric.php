<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorMetric extends Model
{
    protected $fillable = [
        'vendor_id',
        'total_bids',
        'successful_bids',
        'award_count',
        'projects_completed',
        'messages_received',
        'messages_replied',
        'total_response_minutes',
        'response_count',
        'review_count',
        'review_sum',
        'unlock_count',
        'last_active_at',
        'recommendations_received',
        'profile_views',
        'invites_received'
    ];

    protected $casts = [
        'last_active_at' => 'datetime',
    ];

    protected $appends = ['response_rate', 'completion_rate', 'rating_average', 'avg_response_minutes', 'win_rate'];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function getResponseRateAttribute()
    {
        if ($this->messages_received === 0) return 0.0;
        return round(($this->messages_replied / $this->messages_received) * 100, 2);
    }

    public function getCompletionRateAttribute()
    {
        if ($this->award_count === 0) return 0.0;
        return round(($this->projects_completed / $this->award_count) * 100, 2);
    }

    public function getWinRateAttribute()
    {
        if ($this->total_bids === 0) return 0.0;
        return round(($this->successful_bids / $this->total_bids) * 100, 2);
    }

    public function getRatingAverageAttribute()
    {
        if ($this->review_count < 3) {
            // Cold-start protection: return platform average or default to 4.5
            return 4.5;
        }
        return round($this->review_sum / $this->review_count, 2);
    }

    public function getAvgResponseMinutesAttribute()
    {
        if ($this->response_count === 0) return 0;
        return round($this->total_response_minutes / $this->response_count, 0);
    }
}
