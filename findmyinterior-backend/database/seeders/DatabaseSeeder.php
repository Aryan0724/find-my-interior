<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Run in strict dependency order
        $this->call([
            AdminSeeder::class,           // Creates admin user
            DistrictSeeder::class,        // Bihar's 38 districts
            CitySeeder::class,            // Major cities per district
            CategorySeeder::class,        // 10 marketplace categories
            SubscriptionPlanSeeder::class, // Basic, Professional, Premium

            // ── Marketplace Seed Data (makes the platform look alive) ──────────
            BuilderSeeder::class,         // 20 builders + 5 projects each
            SupplierSeeder::class,        // 20 suppliers + 5 products each
            WorkerSeeder::class,          // 50 workers
            ListingSeeder::class,         // 50 professionals across all categories
            BlogSeeder::class,            // 10 blog posts
        ]);
    }
}
