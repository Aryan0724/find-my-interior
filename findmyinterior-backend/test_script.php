<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$request = \Illuminate\Http\Request::create('/api/v1/user/professional-profile', 'GET');
$user = \App\Models\User::latest('last_login_at')->first();

if (!$user) {
    echo "No users found.\n";
    exit;
}

echo "Testing as user: " . $user->email . "\n";
$request->setUserResolver(function () use ($user) {
    return $user;
});

// Since we are not using the real router here, let's just instantiate the controller and call the method
$controller = new \App\Http\Controllers\Api\V1\ProfessionalProfileController();
try {
    $response = $controller->show($request);
    echo "Professional Profile Response: " . $response->getContent() . "\n";
} catch (\Throwable $e) {
    echo "Professional Profile Error: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine() . "\n";
}

$controller2 = app()->make(\App\Http\Controllers\Api\V1\VerificationController::class);
try {
    $response2 = $controller2->status($request);
    echo "Verification Status Response: " . $response2->getContent() . "\n";
} catch (\Throwable $e) {
    echo "Verification Status Error: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine() . "\n";
}
