<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = \App\Models\User::where('phone', '9470650991')->first();
if ($user) {
    echo "User: {$user->name}, Email: {$user->email}\n";
    echo "Roles: " . json_encode($user->roles->pluck('slug')) . "\n";
} else {
    echo "User not found.\n";
}
