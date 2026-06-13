<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Roles
        $roles = [
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Customer', 'slug' => 'customer'],
            ['name' => 'Business', 'slug' => 'business'],
            ['name' => 'Builder', 'slug' => 'builder'],
            ['name' => 'Supplier', 'slug' => 'supplier'],
            ['name' => 'Worker', 'slug' => 'worker'],
        ];
        
        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(['slug' => $role['slug']], $role);
        }
        
        $adminRoleId = DB::table('roles')->where('slug', 'admin')->value('id');

        // 2. Create Admin
        $user = User::firstOrCreate(
            ['email' => 'admin@findmyinterior.com'],
            [
                'name' => 'FindMyInterior Admin',
                'phone' => '9999999999',
                'password' => Hash::make('Admin@123456'),
                'verification_level' => 'site_verified',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
        
        DB::table('user_roles')->updateOrInsert(['user_id' => $user->id, 'role_id' => $adminRoleId], []);
        DB::table('wallets')->updateOrInsert(['user_id' => $user->id], ['balance' => 999999]);
    }
}
