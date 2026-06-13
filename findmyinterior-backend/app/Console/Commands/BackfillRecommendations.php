<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Requirement;
use App\Services\RecommendationEngineService;

class BackfillRecommendations extends Command
{
    protected $signature = 'vendor:backfill-recommendations';
    protected $description = 'Generates recommendations for all open requirements';

    public function handle(RecommendationEngineService $engine)
    {
        $this->info('Starting recommendations backfill...');
        $requirements = Requirement::whereIn('status', ['open', 'bidding'])->get();
        
        foreach ($requirements as $req) {
            $engine->generateFor($req);
        }
        
        $this->info('Recommendations backfilled successfully!');
    }
}
