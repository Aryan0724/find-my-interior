<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = \App\Models\User::whereHas('roles', function($q) { $q->where('slug', 'skilled_worker'); })->first();
if ($user) {
    echo "Found skilled worker: ID " . $user->id . " Email " . $user->email . "\n";
} else {
    echo "No skilled worker found.\n";
}

$user2 = \App\Models\User::whereHas('roles', function($q) { $q->where('slug', 'worker'); })->first();
if ($user2) {
    echo "Found worker: ID " . $user2->id . " Email " . $user2->email . "\n";
} else {
    echo "No worker found.\n";
}
