<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = \App\Models\User::where('email', 'scrapeworldz@gmail.com')->first();
if ($user) {
    echo "Roles: " . json_encode($user->roles->pluck('slug')) . "\n";
}
