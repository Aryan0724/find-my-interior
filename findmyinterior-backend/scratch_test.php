<?php

use App\Http\Controllers\Api\V1\OpportunityProjectController;
use Illuminate\Http\Request;

try {
    $req = new Request([
        'title' => 'Need a new kitchen',
        'description' => 'Details about the kitchen',
        'city' => 'Patna',
        'district' => 'Patna',
        'opportunity_type' => 'PROJECT',
        'requirement_type' => 'INTERIOR_DESIGN',
        'project_category' => '2BHK',
    ]);
    
    \Illuminate\Support\Facades\Auth::loginUsingId(1);
    
    $ctrl = new OpportunityProjectController();
    $res = $ctrl->store($req);
    echo "SUCCESS: " . json_encode($res->getData());
} catch (\Throwable $e) {
    echo "FAILED: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine() . "\n";
}
