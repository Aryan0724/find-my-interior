<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\Requirement;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MarketplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('password');

        // 1. Create Users
        $homeowners = $this->createUsers('Homeowner', 10, ['customer'], $password, false);
        $designers = $this->createUsers('Designer', 20, ['business'], $password, true);
        $contractors = $this->createUsers('Contractor', 10, ['worker', 'business'], $password, true);
        $suppliers = $this->createUsers('Supplier', 5, ['supplier'], $password, false);

        $professionals = array_merge($designers, $contractors, $suppliers);

        // 2. Create Opportunities
        $opportunities = [];
        foreach ($homeowners as $homeowner) {
            for ($i = 0; $i < 5; $i++) {
                $opportunities[] = Requirement::create([
                    'user_id' => $homeowner->id,
                    'title' => "Project " . Str::random(5) . " for " . $homeowner->name,
                    'description' => "Looking for a professional to handle " . Str::random(10) . ".",
                    'budget_min' => rand(50000, 200000),
                    'budget_max' => rand(200000, 500000),
                    'city' => ['Mumbai', 'Delhi', 'Bangalore', 'Chennai'][rand(0, 3)],
                    'district' => 'Central',
                    'category_id' => 1,
                    'status' => 'published',
                    'project_type' => 'Apartment',
                    'project_category' => 'Apartment',
                    'requirement_type' => 'Interior Design',
                    'name' => $homeowner->name,
                    'phone' => '98765' . rand(10000, 99999),
                    'email' => $homeowner->email,
                    'target_roles' => ['business', 'worker'],
                ]);
            }
        }

        // 3. Create Bids
        foreach ($opportunities as $opportunity) {
            // Each opportunity gets 2 bids
            $selectedPros = array_rand($professionals, 2);
            foreach ($selectedPros as $proIndex) {
                $pro = $professionals[$proIndex];
                
                Bid::create([
                    'requirement_id' => $opportunity->id,
                    'professional_id' => $pro->id,
                    'amount' => $opportunity->budget_max * (rand(80, 120) / 100),
                    'timeline_days' => rand(15, 90),
                    'proposal_message' => "We can complete this project perfectly within your budget.",
                    'status' => 'pending',
                    'smart_bid_score' => rand(60, 95),
                ]);
            }
        }
        
        $this->command->info('Marketplace Seeder completed: 10 Homeowners, 35 Professionals, 50 Opportunities, 100 Bids.');
    }

    private function createUsers(string $prefix, int $count, array $roles, string $password, bool $createListing): array
    {
        $users = [];
        $primaryRole = \App\Models\Role::where('slug', $roles[0])->first();
        
        $roleIds = [];
        foreach ($roles as $slug) {
            $role = \App\Models\Role::where('slug', $slug)->first();
            if ($role) $roleIds[] = $role->id;
        }

        for ($i = 1; $i <= $count; $i++) {
            $user = User::create([
                'name' => "{$prefix} {$i}",
                'email' => strtolower($prefix) . "{$i}@example.com",
                'password' => $password,
                'phone' => '99999' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'primary_role_id' => $primaryRole ? $primaryRole->id : null,
            ]);
            $user->roles()->sync($roleIds);

            if ($createListing) {
                \App\Models\Listing::create([
                    'user_id' => $user->id,
                    'category_id' => 1,
                    'title' => "{$prefix} {$i} Services",
                    'slug' => Str::slug("{$prefix} {$i} Services") . '-' . rand(1000, 9999),
                    'description' => "Professional {$prefix} services in Bihar.",
                    'city' => ['Patna', 'Gaya', 'Bhagalpur', 'Muzaffarpur'][rand(0, 3)],
                    'district' => 'Central',
                    'status' => 'active',
                    'is_verified' => true,
                    'avg_rating' => rand(35, 50) / 10,
                    'review_count' => rand(5, 50),
                    'years_experience' => rand(2, 15),
                ]);
            }
            $users[] = $user;
        }
        return $users;
    }
}
