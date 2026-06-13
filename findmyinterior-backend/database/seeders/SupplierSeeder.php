<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Supplier;
use App\Models\SupplierProduct;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class SupplierSeeder extends Seeder {
  public function run(): void {
  Supplier::unguard();
  SupplierProduct::unguard();
  $sRoleId = DB::table('roles')->where('slug', 'supplier')->value('id');

        $u = User::create(['name' => 'Patna Furniture Depot Account', 'email' => 'supplier1@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570001']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s1 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Patna Furniture Depot', 'slug' => Str::slug('Patna Furniture Depot-1'),
            'tagline' => 'Top dealer of Furniture in Darbhanga. We provide high-quality materials at wholesale rates.',
            'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 148,
            'cover_image' => 'https://picsum.photos/seed/supplier1/400/400',
            'phone' => '9876570001', 'email' => 'contact@supplier1.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s1->id, 'name' => 'Premium Furniture Model 1', 'slug' => Str::slug('Premium Furniture 1'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 750, 'price_max' => 3801, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product1/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s1->id, 'name' => 'Premium Furniture Model 2', 'slug' => Str::slug('Premium Furniture 2'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 382, 'price_max' => 3618, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product2/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s1->id, 'name' => 'Premium Furniture Model 3', 'slug' => Str::slug('Premium Furniture 3'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 653, 'price_max' => 1587, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product3/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s1->id, 'name' => 'Premium Furniture Model 4', 'slug' => Str::slug('Premium Furniture 4'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 801, 'price_max' => 3532, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product4/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s1->id, 'name' => 'Premium Furniture Model 5', 'slug' => Str::slug('Premium Furniture 5'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 979, 'price_max' => 1609, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product5/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Aluminium World Account', 'email' => 'supplier2@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570002']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s2 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Aluminium World', 'slug' => Str::slug('Bihar Aluminium World-2'),
            'tagline' => 'Top dealer of Aluminium in Bhagalpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.9, 'review_count' => 35,
            'cover_image' => 'https://picsum.photos/seed/supplier2/400/400',
            'phone' => '9876570002', 'email' => 'contact@supplier2.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s2->id, 'name' => 'Premium Aluminium Model 1', 'slug' => Str::slug('Premium Aluminium 6'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 199, 'price_max' => 2221, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product6/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s2->id, 'name' => 'Premium Aluminium Model 2', 'slug' => Str::slug('Premium Aluminium 7'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 962, 'price_max' => 1675, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product7/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s2->id, 'name' => 'Premium Aluminium Model 3', 'slug' => Str::slug('Premium Aluminium 8'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 962, 'price_max' => 2639, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product8/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s2->id, 'name' => 'Premium Aluminium Model 4', 'slug' => Str::slug('Premium Aluminium 9'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 447, 'price_max' => 1902, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product9/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s2->id, 'name' => 'Premium Aluminium Model 5', 'slug' => Str::slug('Premium Aluminium 10'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 138, 'price_max' => 3329, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product10/600/600'
            ]);
            
        $u = User::create(['name' => 'Patna Glass Depot Account', 'email' => 'supplier3@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570003']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s3 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Patna Glass Depot', 'slug' => Str::slug('Patna Glass Depot-3'),
            'tagline' => 'Top dealer of Glass in Purnia. We provide high-quality materials at wholesale rates.',
            'city' => 'Purnia', 'district' => 'Purnia',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.6, 'review_count' => 66,
            'cover_image' => 'https://picsum.photos/seed/supplier3/400/400',
            'phone' => '9876570003', 'email' => 'contact@supplier3.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s3->id, 'name' => 'Premium Glass Model 1', 'slug' => Str::slug('Premium Glass 11'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 103, 'price_max' => 1536, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product11/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s3->id, 'name' => 'Premium Glass Model 2', 'slug' => Str::slug('Premium Glass 12'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 732, 'price_max' => 1465, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product12/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s3->id, 'name' => 'Premium Glass Model 3', 'slug' => Str::slug('Premium Glass 13'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 307, 'price_max' => 3509, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product13/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s3->id, 'name' => 'Premium Glass Model 4', 'slug' => Str::slug('Premium Glass 14'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 394, 'price_max' => 4134, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product14/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s3->id, 'name' => 'Premium Glass Model 5', 'slug' => Str::slug('Premium Glass 15'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 353, 'price_max' => 1461, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product15/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Lighting Traders Account', 'email' => 'supplier4@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570004']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s4 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Lighting Traders', 'slug' => Str::slug('Magadh Lighting Traders-4'),
            'tagline' => 'Top dealer of Lighting in Muzaffarpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.8, 'review_count' => 38,
            'cover_image' => 'https://picsum.photos/seed/supplier4/400/400',
            'phone' => '9876570004', 'email' => 'contact@supplier4.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s4->id, 'name' => 'Premium Lighting Model 1', 'slug' => Str::slug('Premium Lighting 16'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 939, 'price_max' => 4714, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product16/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s4->id, 'name' => 'Premium Lighting Model 2', 'slug' => Str::slug('Premium Lighting 17'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 789, 'price_max' => 2084, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product17/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s4->id, 'name' => 'Premium Lighting Model 3', 'slug' => Str::slug('Premium Lighting 18'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 235, 'price_max' => 1488, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product18/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s4->id, 'name' => 'Premium Lighting Model 4', 'slug' => Str::slug('Premium Lighting 19'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 364, 'price_max' => 2732, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product19/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s4->id, 'name' => 'Premium Lighting Model 5', 'slug' => Str::slug('Premium Lighting 20'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 241, 'price_max' => 4384, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product20/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Sanitary Traders Account', 'email' => 'supplier5@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570005']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s5 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Sanitary Traders', 'slug' => Str::slug('Magadh Sanitary Traders-5'),
            'tagline' => 'Top dealer of Sanitary in Muzaffarpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.0, 'review_count' => 28,
            'cover_image' => 'https://picsum.photos/seed/supplier5/400/400',
            'phone' => '9876570005', 'email' => 'contact@supplier5.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s5->id, 'name' => 'Premium Sanitary Model 1', 'slug' => Str::slug('Premium Sanitary 21'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 895, 'price_max' => 2464, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product21/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s5->id, 'name' => 'Premium Sanitary Model 2', 'slug' => Str::slug('Premium Sanitary 22'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 285, 'price_max' => 4299, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product22/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s5->id, 'name' => 'Premium Sanitary Model 3', 'slug' => Str::slug('Premium Sanitary 23'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 852, 'price_max' => 2017, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product23/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s5->id, 'name' => 'Premium Sanitary Model 4', 'slug' => Str::slug('Premium Sanitary 24'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 382, 'price_max' => 1508, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product24/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s5->id, 'name' => 'Premium Sanitary Model 5', 'slug' => Str::slug('Premium Sanitary 25'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 782, 'price_max' => 4414, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product25/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Hardware Traders Account', 'email' => 'supplier6@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570006']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s6 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Hardware Traders', 'slug' => Str::slug('Magadh Hardware Traders-6'),
            'tagline' => 'Top dealer of Hardware in Bhagalpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.8, 'review_count' => 70,
            'cover_image' => 'https://picsum.photos/seed/supplier6/400/400',
            'phone' => '9876570006', 'email' => 'contact@supplier6.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s6->id, 'name' => 'Premium Hardware Model 1', 'slug' => Str::slug('Premium Hardware 26'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 477, 'price_max' => 3660, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product26/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s6->id, 'name' => 'Premium Hardware Model 2', 'slug' => Str::slug('Premium Hardware 27'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 954, 'price_max' => 3249, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product27/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s6->id, 'name' => 'Premium Hardware Model 3', 'slug' => Str::slug('Premium Hardware 28'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 332, 'price_max' => 3878, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product28/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s6->id, 'name' => 'Premium Hardware Model 4', 'slug' => Str::slug('Premium Hardware 29'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 110, 'price_max' => 2302, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product29/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s6->id, 'name' => 'Premium Hardware Model 5', 'slug' => Str::slug('Premium Hardware 30'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 958, 'price_max' => 4048, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product30/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Hardware World Account', 'email' => 'supplier7@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570007']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s7 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Hardware World', 'slug' => Str::slug('Bihar Hardware World-7'),
            'tagline' => 'Top dealer of Hardware in Patna. We provide high-quality materials at wholesale rates.',
            'city' => 'Patna', 'district' => 'Patna',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.3, 'review_count' => 122,
            'cover_image' => 'https://picsum.photos/seed/supplier7/400/400',
            'phone' => '9876570007', 'email' => 'contact@supplier7.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s7->id, 'name' => 'Premium Hardware Model 1', 'slug' => Str::slug('Premium Hardware 31'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 767, 'price_max' => 2593, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product31/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s7->id, 'name' => 'Premium Hardware Model 2', 'slug' => Str::slug('Premium Hardware 32'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 505, 'price_max' => 4862, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product32/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s7->id, 'name' => 'Premium Hardware Model 3', 'slug' => Str::slug('Premium Hardware 33'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 547, 'price_max' => 4876, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product33/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s7->id, 'name' => 'Premium Hardware Model 4', 'slug' => Str::slug('Premium Hardware 34'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 525, 'price_max' => 1326, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product34/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s7->id, 'name' => 'Premium Hardware Model 5', 'slug' => Str::slug('Premium Hardware 35'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 867, 'price_max' => 1725, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product35/600/600'
            ]);
            
        $u = User::create(['name' => 'Plywood Emporium Account', 'email' => 'supplier8@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570008']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s8 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Plywood Emporium', 'slug' => Str::slug('Plywood Emporium-8'),
            'tagline' => 'Top dealer of Plywood in Patna. We provide high-quality materials at wholesale rates.',
            'city' => 'Patna', 'district' => 'Patna',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.0, 'review_count' => 112,
            'cover_image' => 'https://picsum.photos/seed/supplier8/400/400',
            'phone' => '9876570008', 'email' => 'contact@supplier8.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s8->id, 'name' => 'Premium Plywood Model 1', 'slug' => Str::slug('Premium Plywood 36'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 967, 'price_max' => 1232, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product36/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s8->id, 'name' => 'Premium Plywood Model 2', 'slug' => Str::slug('Premium Plywood 37'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 567, 'price_max' => 2350, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product37/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s8->id, 'name' => 'Premium Plywood Model 3', 'slug' => Str::slug('Premium Plywood 38'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 973, 'price_max' => 2969, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product38/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s8->id, 'name' => 'Premium Plywood Model 4', 'slug' => Str::slug('Premium Plywood 39'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 198, 'price_max' => 2731, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product39/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s8->id, 'name' => 'Premium Plywood Model 5', 'slug' => Str::slug('Premium Plywood 40'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 914, 'price_max' => 3410, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product40/600/600'
            ]);
            
        $u = User::create(['name' => 'Ganga Furniture House Account', 'email' => 'supplier9@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570009']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s9 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Ganga Furniture House', 'slug' => Str::slug('Ganga Furniture House-9'),
            'tagline' => 'Top dealer of Furniture in Darbhanga. We provide high-quality materials at wholesale rates.',
            'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.6, 'review_count' => 73,
            'cover_image' => 'https://picsum.photos/seed/supplier9/400/400',
            'phone' => '9876570009', 'email' => 'contact@supplier9.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s9->id, 'name' => 'Premium Furniture Model 1', 'slug' => Str::slug('Premium Furniture 41'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 928, 'price_max' => 3627, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product41/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s9->id, 'name' => 'Premium Furniture Model 2', 'slug' => Str::slug('Premium Furniture 42'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 834, 'price_max' => 4872, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product42/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s9->id, 'name' => 'Premium Furniture Model 3', 'slug' => Str::slug('Premium Furniture 43'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 323, 'price_max' => 1813, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product43/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s9->id, 'name' => 'Premium Furniture Model 4', 'slug' => Str::slug('Premium Furniture 44'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 229, 'price_max' => 3679, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product44/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s9->id, 'name' => 'Premium Furniture Model 5', 'slug' => Str::slug('Premium Furniture 45'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 208, 'price_max' => 1877, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product45/600/600'
            ]);
            
        $u = User::create(['name' => 'Granite Emporium Account', 'email' => 'supplier10@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570010']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s10 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Granite Emporium', 'slug' => Str::slug('Granite Emporium-10'),
            'tagline' => 'Top dealer of Granite in Darbhanga. We provide high-quality materials at wholesale rates.',
            'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.0, 'review_count' => 119,
            'cover_image' => 'https://picsum.photos/seed/supplier10/400/400',
            'phone' => '9876570010', 'email' => 'contact@supplier10.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s10->id, 'name' => 'Premium Granite Model 1', 'slug' => Str::slug('Premium Granite 46'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 851, 'price_max' => 3971, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product46/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s10->id, 'name' => 'Premium Granite Model 2', 'slug' => Str::slug('Premium Granite 47'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 787, 'price_max' => 3497, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product47/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s10->id, 'name' => 'Premium Granite Model 3', 'slug' => Str::slug('Premium Granite 48'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 437, 'price_max' => 4916, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product48/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s10->id, 'name' => 'Premium Granite Model 4', 'slug' => Str::slug('Premium Granite 49'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 587, 'price_max' => 1905, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product49/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s10->id, 'name' => 'Premium Granite Model 5', 'slug' => Str::slug('Premium Granite 50'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 674, 'price_max' => 3353, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product50/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Granite Traders Account', 'email' => 'supplier11@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570011']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s11 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Granite Traders', 'slug' => Str::slug('Magadh Granite Traders-11'),
            'tagline' => 'Top dealer of Granite in Muzaffarpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.7, 'review_count' => 129,
            'cover_image' => 'https://picsum.photos/seed/supplier11/400/400',
            'phone' => '9876570011', 'email' => 'contact@supplier11.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s11->id, 'name' => 'Premium Granite Model 1', 'slug' => Str::slug('Premium Granite 51'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 937, 'price_max' => 4428, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product51/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s11->id, 'name' => 'Premium Granite Model 2', 'slug' => Str::slug('Premium Granite 52'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 292, 'price_max' => 1061, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product52/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s11->id, 'name' => 'Premium Granite Model 3', 'slug' => Str::slug('Premium Granite 53'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 432, 'price_max' => 2607, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product53/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s11->id, 'name' => 'Premium Granite Model 4', 'slug' => Str::slug('Premium Granite 54'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 535, 'price_max' => 1942, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product54/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s11->id, 'name' => 'Premium Granite Model 5', 'slug' => Str::slug('Premium Granite 55'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 122, 'price_max' => 1140, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product55/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Glass World Account', 'email' => 'supplier12@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570012']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s12 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Glass World', 'slug' => Str::slug('Bihar Glass World-12'),
            'tagline' => 'Top dealer of Glass in Purnia. We provide high-quality materials at wholesale rates.',
            'city' => 'Purnia', 'district' => 'Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 90,
            'cover_image' => 'https://picsum.photos/seed/supplier12/400/400',
            'phone' => '9876570012', 'email' => 'contact@supplier12.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s12->id, 'name' => 'Premium Glass Model 1', 'slug' => Str::slug('Premium Glass 56'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 898, 'price_max' => 1760, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product56/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s12->id, 'name' => 'Premium Glass Model 2', 'slug' => Str::slug('Premium Glass 57'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 307, 'price_max' => 1136, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product57/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s12->id, 'name' => 'Premium Glass Model 3', 'slug' => Str::slug('Premium Glass 58'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 115, 'price_max' => 2439, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product58/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s12->id, 'name' => 'Premium Glass Model 4', 'slug' => Str::slug('Premium Glass 59'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 773, 'price_max' => 4455, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product59/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s12->id, 'name' => 'Premium Glass Model 5', 'slug' => Str::slug('Premium Glass 60'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 828, 'price_max' => 2137, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product60/600/600'
            ]);
            
        $u = User::create(['name' => 'Tiles Emporium Account', 'email' => 'supplier13@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570013']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s13 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Tiles Emporium', 'slug' => Str::slug('Tiles Emporium-13'),
            'tagline' => 'Top dealer of Tiles in Gaya. We provide high-quality materials at wholesale rates.',
            'city' => 'Gaya', 'district' => 'Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 36,
            'cover_image' => 'https://picsum.photos/seed/supplier13/400/400',
            'phone' => '9876570013', 'email' => 'contact@supplier13.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s13->id, 'name' => 'Premium Tiles Model 1', 'slug' => Str::slug('Premium Tiles 61'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 727, 'price_max' => 2471, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product61/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s13->id, 'name' => 'Premium Tiles Model 2', 'slug' => Str::slug('Premium Tiles 62'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 893, 'price_max' => 2170, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product62/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s13->id, 'name' => 'Premium Tiles Model 3', 'slug' => Str::slug('Premium Tiles 63'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 952, 'price_max' => 2096, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product63/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s13->id, 'name' => 'Premium Tiles Model 4', 'slug' => Str::slug('Premium Tiles 64'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 520, 'price_max' => 2273, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product64/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s13->id, 'name' => 'Premium Tiles Model 5', 'slug' => Str::slug('Premium Tiles 65'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 503, 'price_max' => 1797, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product65/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Lighting Traders Account', 'email' => 'supplier14@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570014']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s14 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Lighting Traders', 'slug' => Str::slug('Magadh Lighting Traders-14'),
            'tagline' => 'Top dealer of Lighting in Bhagalpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.5, 'review_count' => 73,
            'cover_image' => 'https://picsum.photos/seed/supplier14/400/400',
            'phone' => '9876570014', 'email' => 'contact@supplier14.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s14->id, 'name' => 'Premium Lighting Model 1', 'slug' => Str::slug('Premium Lighting 66'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 562, 'price_max' => 1305, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product66/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s14->id, 'name' => 'Premium Lighting Model 2', 'slug' => Str::slug('Premium Lighting 67'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 379, 'price_max' => 1887, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product67/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s14->id, 'name' => 'Premium Lighting Model 3', 'slug' => Str::slug('Premium Lighting 68'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 315, 'price_max' => 3586, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product68/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s14->id, 'name' => 'Premium Lighting Model 4', 'slug' => Str::slug('Premium Lighting 69'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 366, 'price_max' => 3600, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product69/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s14->id, 'name' => 'Premium Lighting Model 5', 'slug' => Str::slug('Premium Lighting 70'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 574, 'price_max' => 3355, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product70/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Furniture Traders Account', 'email' => 'supplier15@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570015']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s15 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Furniture Traders', 'slug' => Str::slug('Magadh Furniture Traders-15'),
            'tagline' => 'Top dealer of Furniture in Gaya. We provide high-quality materials at wholesale rates.',
            'city' => 'Gaya', 'district' => 'Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 111,
            'cover_image' => 'https://picsum.photos/seed/supplier15/400/400',
            'phone' => '9876570015', 'email' => 'contact@supplier15.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s15->id, 'name' => 'Premium Furniture Model 1', 'slug' => Str::slug('Premium Furniture 71'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 667, 'price_max' => 2844, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product71/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s15->id, 'name' => 'Premium Furniture Model 2', 'slug' => Str::slug('Premium Furniture 72'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 739, 'price_max' => 2483, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product72/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s15->id, 'name' => 'Premium Furniture Model 3', 'slug' => Str::slug('Premium Furniture 73'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 654, 'price_max' => 3343, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product73/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s15->id, 'name' => 'Premium Furniture Model 4', 'slug' => Str::slug('Premium Furniture 74'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 895, 'price_max' => 3859, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product74/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s15->id, 'name' => 'Premium Furniture Model 5', 'slug' => Str::slug('Premium Furniture 75'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 265, 'price_max' => 3150, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product75/600/600'
            ]);
            
        $u = User::create(['name' => 'Patna Plywood Depot Account', 'email' => 'supplier16@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570016']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s16 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Patna Plywood Depot', 'slug' => Str::slug('Patna Plywood Depot-16'),
            'tagline' => 'Top dealer of Plywood in Gaya. We provide high-quality materials at wholesale rates.',
            'city' => 'Gaya', 'district' => 'Gaya',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 5.0, 'review_count' => 141,
            'cover_image' => 'https://picsum.photos/seed/supplier16/400/400',
            'phone' => '9876570016', 'email' => 'contact@supplier16.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s16->id, 'name' => 'Premium Plywood Model 1', 'slug' => Str::slug('Premium Plywood 76'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 803, 'price_max' => 3232, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product76/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s16->id, 'name' => 'Premium Plywood Model 2', 'slug' => Str::slug('Premium Plywood 77'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 529, 'price_max' => 4163, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product77/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s16->id, 'name' => 'Premium Plywood Model 3', 'slug' => Str::slug('Premium Plywood 78'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 465, 'price_max' => 4249, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product78/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s16->id, 'name' => 'Premium Plywood Model 4', 'slug' => Str::slug('Premium Plywood 79'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 177, 'price_max' => 1699, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product79/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s16->id, 'name' => 'Premium Plywood Model 5', 'slug' => Str::slug('Premium Plywood 80'),
                'description' => 'High quality Plywood suitable for all modern constructions.',
                'category' => 'Plywood', 'price_min' => 173, 'price_max' => 1014, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product80/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Aluminium Traders Account', 'email' => 'supplier17@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570017']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s17 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Aluminium Traders', 'slug' => Str::slug('Magadh Aluminium Traders-17'),
            'tagline' => 'Top dealer of Aluminium in Darbhanga. We provide high-quality materials at wholesale rates.',
            'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.2, 'review_count' => 115,
            'cover_image' => 'https://picsum.photos/seed/supplier17/400/400',
            'phone' => '9876570017', 'email' => 'contact@supplier17.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s17->id, 'name' => 'Premium Aluminium Model 1', 'slug' => Str::slug('Premium Aluminium 81'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 491, 'price_max' => 1369, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product81/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s17->id, 'name' => 'Premium Aluminium Model 2', 'slug' => Str::slug('Premium Aluminium 82'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 622, 'price_max' => 4796, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product82/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s17->id, 'name' => 'Premium Aluminium Model 3', 'slug' => Str::slug('Premium Aluminium 83'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 157, 'price_max' => 4619, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product83/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s17->id, 'name' => 'Premium Aluminium Model 4', 'slug' => Str::slug('Premium Aluminium 84'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 481, 'price_max' => 1732, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product84/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s17->id, 'name' => 'Premium Aluminium Model 5', 'slug' => Str::slug('Premium Aluminium 85'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 695, 'price_max' => 1589, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product85/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Hardware Traders Account', 'email' => 'supplier18@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570018']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s18 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Hardware Traders', 'slug' => Str::slug('Magadh Hardware Traders-18'),
            'tagline' => 'Top dealer of Hardware in Darbhanga. We provide high-quality materials at wholesale rates.',
            'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.7, 'review_count' => 41,
            'cover_image' => 'https://picsum.photos/seed/supplier18/400/400',
            'phone' => '9876570018', 'email' => 'contact@supplier18.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s18->id, 'name' => 'Premium Hardware Model 1', 'slug' => Str::slug('Premium Hardware 86'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 820, 'price_max' => 3806, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product86/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s18->id, 'name' => 'Premium Hardware Model 2', 'slug' => Str::slug('Premium Hardware 87'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 750, 'price_max' => 2655, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product87/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s18->id, 'name' => 'Premium Hardware Model 3', 'slug' => Str::slug('Premium Hardware 88'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 851, 'price_max' => 4603, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product88/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s18->id, 'name' => 'Premium Hardware Model 4', 'slug' => Str::slug('Premium Hardware 89'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 604, 'price_max' => 3229, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product89/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s18->id, 'name' => 'Premium Hardware Model 5', 'slug' => Str::slug('Premium Hardware 90'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 634, 'price_max' => 2466, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product90/600/600'
            ]);
            
        $u = User::create(['name' => 'Ganga Hardware House Account', 'email' => 'supplier19@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570019']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s19 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Ganga Hardware House', 'slug' => Str::slug('Ganga Hardware House-19'),
            'tagline' => 'Top dealer of Hardware in Purnia. We provide high-quality materials at wholesale rates.',
            'city' => 'Purnia', 'district' => 'Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.7, 'review_count' => 73,
            'cover_image' => 'https://picsum.photos/seed/supplier19/400/400',
            'phone' => '9876570019', 'email' => 'contact@supplier19.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s19->id, 'name' => 'Premium Hardware Model 1', 'slug' => Str::slug('Premium Hardware 91'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 564, 'price_max' => 4965, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product91/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s19->id, 'name' => 'Premium Hardware Model 2', 'slug' => Str::slug('Premium Hardware 92'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 347, 'price_max' => 1507, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product92/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s19->id, 'name' => 'Premium Hardware Model 3', 'slug' => Str::slug('Premium Hardware 93'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 842, 'price_max' => 2743, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product93/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s19->id, 'name' => 'Premium Hardware Model 4', 'slug' => Str::slug('Premium Hardware 94'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 197, 'price_max' => 1483, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product94/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s19->id, 'name' => 'Premium Hardware Model 5', 'slug' => Str::slug('Premium Hardware 95'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 133, 'price_max' => 4454, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product95/600/600'
            ]);
            
        $u = User::create(['name' => 'Glass Emporium Account', 'email' => 'supplier20@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570020']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s20 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Glass Emporium', 'slug' => Str::slug('Glass Emporium-20'),
            'tagline' => 'Top dealer of Glass in Patna. We provide high-quality materials at wholesale rates.',
            'city' => 'Patna', 'district' => 'Patna',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 150,
            'cover_image' => 'https://picsum.photos/seed/supplier20/400/400',
            'phone' => '9876570020', 'email' => 'contact@supplier20.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s20->id, 'name' => 'Premium Glass Model 1', 'slug' => Str::slug('Premium Glass 96'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 842, 'price_max' => 3191, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product96/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s20->id, 'name' => 'Premium Glass Model 2', 'slug' => Str::slug('Premium Glass 97'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 380, 'price_max' => 2437, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product97/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s20->id, 'name' => 'Premium Glass Model 3', 'slug' => Str::slug('Premium Glass 98'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 974, 'price_max' => 1334, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product98/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s20->id, 'name' => 'Premium Glass Model 4', 'slug' => Str::slug('Premium Glass 99'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 982, 'price_max' => 1098, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product99/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s20->id, 'name' => 'Premium Glass Model 5', 'slug' => Str::slug('Premium Glass 100'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 677, 'price_max' => 1591, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product100/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Sanitary World Account', 'email' => 'supplier21@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570021']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s21 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Sanitary World', 'slug' => Str::slug('Bihar Sanitary World-21'),
            'tagline' => 'Top dealer of Sanitary in Muzaffarpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.3, 'review_count' => 104,
            'cover_image' => 'https://picsum.photos/seed/supplier21/400/400',
            'phone' => '9876570021', 'email' => 'contact@supplier21.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s21->id, 'name' => 'Premium Sanitary Model 1', 'slug' => Str::slug('Premium Sanitary 101'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 110, 'price_max' => 4191, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product101/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s21->id, 'name' => 'Premium Sanitary Model 2', 'slug' => Str::slug('Premium Sanitary 102'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 129, 'price_max' => 4082, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product102/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s21->id, 'name' => 'Premium Sanitary Model 3', 'slug' => Str::slug('Premium Sanitary 103'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 554, 'price_max' => 4074, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product103/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s21->id, 'name' => 'Premium Sanitary Model 4', 'slug' => Str::slug('Premium Sanitary 104'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 889, 'price_max' => 4871, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product104/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s21->id, 'name' => 'Premium Sanitary Model 5', 'slug' => Str::slug('Premium Sanitary 105'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 338, 'price_max' => 3237, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product105/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Hardware World Account', 'email' => 'supplier22@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570022']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s22 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Hardware World', 'slug' => Str::slug('Bihar Hardware World-22'),
            'tagline' => 'Top dealer of Hardware in Purnia. We provide high-quality materials at wholesale rates.',
            'city' => 'Purnia', 'district' => 'Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 118,
            'cover_image' => 'https://picsum.photos/seed/supplier22/400/400',
            'phone' => '9876570022', 'email' => 'contact@supplier22.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s22->id, 'name' => 'Premium Hardware Model 1', 'slug' => Str::slug('Premium Hardware 106'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 126, 'price_max' => 2567, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product106/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s22->id, 'name' => 'Premium Hardware Model 2', 'slug' => Str::slug('Premium Hardware 107'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 565, 'price_max' => 1359, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product107/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s22->id, 'name' => 'Premium Hardware Model 3', 'slug' => Str::slug('Premium Hardware 108'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 585, 'price_max' => 2995, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product108/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s22->id, 'name' => 'Premium Hardware Model 4', 'slug' => Str::slug('Premium Hardware 109'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 831, 'price_max' => 4602, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product109/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s22->id, 'name' => 'Premium Hardware Model 5', 'slug' => Str::slug('Premium Hardware 110'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 531, 'price_max' => 3121, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product110/600/600'
            ]);
            
        $u = User::create(['name' => 'Patna Tiles Depot Account', 'email' => 'supplier23@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570023']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s23 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Patna Tiles Depot', 'slug' => Str::slug('Patna Tiles Depot-23'),
            'tagline' => 'Top dealer of Tiles in Patna. We provide high-quality materials at wholesale rates.',
            'city' => 'Patna', 'district' => 'Patna',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.8, 'review_count' => 25,
            'cover_image' => 'https://picsum.photos/seed/supplier23/400/400',
            'phone' => '9876570023', 'email' => 'contact@supplier23.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s23->id, 'name' => 'Premium Tiles Model 1', 'slug' => Str::slug('Premium Tiles 111'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 154, 'price_max' => 2432, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product111/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s23->id, 'name' => 'Premium Tiles Model 2', 'slug' => Str::slug('Premium Tiles 112'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 347, 'price_max' => 2543, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product112/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s23->id, 'name' => 'Premium Tiles Model 3', 'slug' => Str::slug('Premium Tiles 113'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 972, 'price_max' => 4370, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product113/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s23->id, 'name' => 'Premium Tiles Model 4', 'slug' => Str::slug('Premium Tiles 114'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 508, 'price_max' => 1466, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product114/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s23->id, 'name' => 'Premium Tiles Model 5', 'slug' => Str::slug('Premium Tiles 115'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 117, 'price_max' => 3855, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product115/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Aluminium Traders Account', 'email' => 'supplier24@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570024']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s24 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Aluminium Traders', 'slug' => Str::slug('Magadh Aluminium Traders-24'),
            'tagline' => 'Top dealer of Aluminium in Purnia. We provide high-quality materials at wholesale rates.',
            'city' => 'Purnia', 'district' => 'Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 113,
            'cover_image' => 'https://picsum.photos/seed/supplier24/400/400',
            'phone' => '9876570024', 'email' => 'contact@supplier24.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s24->id, 'name' => 'Premium Aluminium Model 1', 'slug' => Str::slug('Premium Aluminium 116'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 811, 'price_max' => 4895, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product116/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s24->id, 'name' => 'Premium Aluminium Model 2', 'slug' => Str::slug('Premium Aluminium 117'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 216, 'price_max' => 2115, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product117/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s24->id, 'name' => 'Premium Aluminium Model 3', 'slug' => Str::slug('Premium Aluminium 118'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 153, 'price_max' => 4293, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product118/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s24->id, 'name' => 'Premium Aluminium Model 4', 'slug' => Str::slug('Premium Aluminium 119'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 763, 'price_max' => 3620, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product119/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s24->id, 'name' => 'Premium Aluminium Model 5', 'slug' => Str::slug('Premium Aluminium 120'),
                'description' => 'High quality Aluminium suitable for all modern constructions.',
                'category' => 'Aluminium', 'price_min' => 484, 'price_max' => 3840, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product120/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Glass Traders Account', 'email' => 'supplier25@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570025']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s25 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Glass Traders', 'slug' => Str::slug('Magadh Glass Traders-25'),
            'tagline' => 'Top dealer of Glass in Gaya. We provide high-quality materials at wholesale rates.',
            'city' => 'Gaya', 'district' => 'Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.2, 'review_count' => 38,
            'cover_image' => 'https://picsum.photos/seed/supplier25/400/400',
            'phone' => '9876570025', 'email' => 'contact@supplier25.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s25->id, 'name' => 'Premium Glass Model 1', 'slug' => Str::slug('Premium Glass 121'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 881, 'price_max' => 4033, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product121/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s25->id, 'name' => 'Premium Glass Model 2', 'slug' => Str::slug('Premium Glass 122'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 395, 'price_max' => 2319, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product122/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s25->id, 'name' => 'Premium Glass Model 3', 'slug' => Str::slug('Premium Glass 123'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 424, 'price_max' => 4941, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product123/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s25->id, 'name' => 'Premium Glass Model 4', 'slug' => Str::slug('Premium Glass 124'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 224, 'price_max' => 1226, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product124/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s25->id, 'name' => 'Premium Glass Model 5', 'slug' => Str::slug('Premium Glass 125'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 678, 'price_max' => 4827, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product125/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Hardware World Account', 'email' => 'supplier26@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570026']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s26 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Hardware World', 'slug' => Str::slug('Bihar Hardware World-26'),
            'tagline' => 'Top dealer of Hardware in Darbhanga. We provide high-quality materials at wholesale rates.',
            'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 137,
            'cover_image' => 'https://picsum.photos/seed/supplier26/400/400',
            'phone' => '9876570026', 'email' => 'contact@supplier26.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s26->id, 'name' => 'Premium Hardware Model 1', 'slug' => Str::slug('Premium Hardware 126'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 440, 'price_max' => 4983, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product126/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s26->id, 'name' => 'Premium Hardware Model 2', 'slug' => Str::slug('Premium Hardware 127'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 905, 'price_max' => 1928, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product127/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s26->id, 'name' => 'Premium Hardware Model 3', 'slug' => Str::slug('Premium Hardware 128'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 156, 'price_max' => 2883, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product128/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s26->id, 'name' => 'Premium Hardware Model 4', 'slug' => Str::slug('Premium Hardware 129'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 852, 'price_max' => 3032, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product129/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s26->id, 'name' => 'Premium Hardware Model 5', 'slug' => Str::slug('Premium Hardware 130'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 750, 'price_max' => 3332, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product130/600/600'
            ]);
            
        $u = User::create(['name' => 'Ganga Furniture House Account', 'email' => 'supplier27@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570027']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s27 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Ganga Furniture House', 'slug' => Str::slug('Ganga Furniture House-27'),
            'tagline' => 'Top dealer of Furniture in Bhagalpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.9, 'review_count' => 48,
            'cover_image' => 'https://picsum.photos/seed/supplier27/400/400',
            'phone' => '9876570027', 'email' => 'contact@supplier27.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s27->id, 'name' => 'Premium Furniture Model 1', 'slug' => Str::slug('Premium Furniture 131'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 619, 'price_max' => 3435, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product131/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s27->id, 'name' => 'Premium Furniture Model 2', 'slug' => Str::slug('Premium Furniture 132'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 130, 'price_max' => 1108, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product132/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s27->id, 'name' => 'Premium Furniture Model 3', 'slug' => Str::slug('Premium Furniture 133'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 683, 'price_max' => 3219, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product133/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s27->id, 'name' => 'Premium Furniture Model 4', 'slug' => Str::slug('Premium Furniture 134'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 772, 'price_max' => 4410, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product134/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s27->id, 'name' => 'Premium Furniture Model 5', 'slug' => Str::slug('Premium Furniture 135'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 778, 'price_max' => 3744, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product135/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Sanitary World Account', 'email' => 'supplier28@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570028']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s28 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Sanitary World', 'slug' => Str::slug('Bihar Sanitary World-28'),
            'tagline' => 'Top dealer of Sanitary in Bhagalpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 79,
            'cover_image' => 'https://picsum.photos/seed/supplier28/400/400',
            'phone' => '9876570028', 'email' => 'contact@supplier28.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s28->id, 'name' => 'Premium Sanitary Model 1', 'slug' => Str::slug('Premium Sanitary 136'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 574, 'price_max' => 3561, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product136/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s28->id, 'name' => 'Premium Sanitary Model 2', 'slug' => Str::slug('Premium Sanitary 137'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 813, 'price_max' => 3438, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product137/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s28->id, 'name' => 'Premium Sanitary Model 3', 'slug' => Str::slug('Premium Sanitary 138'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 324, 'price_max' => 2456, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product138/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s28->id, 'name' => 'Premium Sanitary Model 4', 'slug' => Str::slug('Premium Sanitary 139'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 511, 'price_max' => 2224, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product139/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s28->id, 'name' => 'Premium Sanitary Model 5', 'slug' => Str::slug('Premium Sanitary 140'),
                'description' => 'High quality Sanitary suitable for all modern constructions.',
                'category' => 'Sanitary', 'price_min' => 403, 'price_max' => 4567, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product140/600/600'
            ]);
            
        $u = User::create(['name' => 'Patna Lighting Depot Account', 'email' => 'supplier29@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570029']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s29 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Patna Lighting Depot', 'slug' => Str::slug('Patna Lighting Depot-29'),
            'tagline' => 'Top dealer of Lighting in Bhagalpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.5, 'review_count' => 47,
            'cover_image' => 'https://picsum.photos/seed/supplier29/400/400',
            'phone' => '9876570029', 'email' => 'contact@supplier29.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s29->id, 'name' => 'Premium Lighting Model 1', 'slug' => Str::slug('Premium Lighting 141'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 972, 'price_max' => 4708, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product141/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s29->id, 'name' => 'Premium Lighting Model 2', 'slug' => Str::slug('Premium Lighting 142'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 294, 'price_max' => 3864, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product142/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s29->id, 'name' => 'Premium Lighting Model 3', 'slug' => Str::slug('Premium Lighting 143'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 983, 'price_max' => 2727, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product143/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s29->id, 'name' => 'Premium Lighting Model 4', 'slug' => Str::slug('Premium Lighting 144'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 670, 'price_max' => 1804, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product144/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s29->id, 'name' => 'Premium Lighting Model 5', 'slug' => Str::slug('Premium Lighting 145'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 489, 'price_max' => 2592, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product145/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Hardware World Account', 'email' => 'supplier30@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570030']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s30 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Hardware World', 'slug' => Str::slug('Bihar Hardware World-30'),
            'tagline' => 'Top dealer of Hardware in Purnia. We provide high-quality materials at wholesale rates.',
            'city' => 'Purnia', 'district' => 'Purnia',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.8, 'review_count' => 106,
            'cover_image' => 'https://picsum.photos/seed/supplier30/400/400',
            'phone' => '9876570030', 'email' => 'contact@supplier30.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s30->id, 'name' => 'Premium Hardware Model 1', 'slug' => Str::slug('Premium Hardware 146'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 725, 'price_max' => 4610, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product146/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s30->id, 'name' => 'Premium Hardware Model 2', 'slug' => Str::slug('Premium Hardware 147'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 841, 'price_max' => 1991, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product147/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s30->id, 'name' => 'Premium Hardware Model 3', 'slug' => Str::slug('Premium Hardware 148'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 161, 'price_max' => 2198, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product148/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s30->id, 'name' => 'Premium Hardware Model 4', 'slug' => Str::slug('Premium Hardware 149'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 944, 'price_max' => 1965, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product149/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s30->id, 'name' => 'Premium Hardware Model 5', 'slug' => Str::slug('Premium Hardware 150'),
                'description' => 'High quality Hardware suitable for all modern constructions.',
                'category' => 'Hardware', 'price_min' => 106, 'price_max' => 3631, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product150/600/600'
            ]);
            
        $u = User::create(['name' => 'Patna Glass Depot Account', 'email' => 'supplier31@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570031']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s31 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Patna Glass Depot', 'slug' => Str::slug('Patna Glass Depot-31'),
            'tagline' => 'Top dealer of Glass in Darbhanga. We provide high-quality materials at wholesale rates.',
            'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.2, 'review_count' => 30,
            'cover_image' => 'https://picsum.photos/seed/supplier31/400/400',
            'phone' => '9876570031', 'email' => 'contact@supplier31.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s31->id, 'name' => 'Premium Glass Model 1', 'slug' => Str::slug('Premium Glass 151'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 207, 'price_max' => 4920, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product151/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s31->id, 'name' => 'Premium Glass Model 2', 'slug' => Str::slug('Premium Glass 152'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 882, 'price_max' => 2986, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product152/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s31->id, 'name' => 'Premium Glass Model 3', 'slug' => Str::slug('Premium Glass 153'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 640, 'price_max' => 1427, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product153/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s31->id, 'name' => 'Premium Glass Model 4', 'slug' => Str::slug('Premium Glass 154'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 228, 'price_max' => 3959, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product154/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s31->id, 'name' => 'Premium Glass Model 5', 'slug' => Str::slug('Premium Glass 155'),
                'description' => 'High quality Glass suitable for all modern constructions.',
                'category' => 'Glass', 'price_min' => 738, 'price_max' => 1215, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product155/600/600'
            ]);
            
        $u = User::create(['name' => 'Lighting Emporium Account', 'email' => 'supplier32@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570032']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s32 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Lighting Emporium', 'slug' => Str::slug('Lighting Emporium-32'),
            'tagline' => 'Top dealer of Lighting in Darbhanga. We provide high-quality materials at wholesale rates.',
            'city' => 'Darbhanga', 'district' => 'Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.2, 'review_count' => 96,
            'cover_image' => 'https://picsum.photos/seed/supplier32/400/400',
            'phone' => '9876570032', 'email' => 'contact@supplier32.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s32->id, 'name' => 'Premium Lighting Model 1', 'slug' => Str::slug('Premium Lighting 156'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 927, 'price_max' => 1475, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product156/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s32->id, 'name' => 'Premium Lighting Model 2', 'slug' => Str::slug('Premium Lighting 157'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 543, 'price_max' => 2881, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product157/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s32->id, 'name' => 'Premium Lighting Model 3', 'slug' => Str::slug('Premium Lighting 158'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 550, 'price_max' => 3667, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product158/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s32->id, 'name' => 'Premium Lighting Model 4', 'slug' => Str::slug('Premium Lighting 159'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 120, 'price_max' => 1060, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product159/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s32->id, 'name' => 'Premium Lighting Model 5', 'slug' => Str::slug('Premium Lighting 160'),
                'description' => 'High quality Lighting suitable for all modern constructions.',
                'category' => 'Lighting', 'price_min' => 989, 'price_max' => 3801, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product160/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Tiles Traders Account', 'email' => 'supplier33@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570033']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s33 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Tiles Traders', 'slug' => Str::slug('Magadh Tiles Traders-33'),
            'tagline' => 'Top dealer of Tiles in Muzaffarpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.3, 'review_count' => 60,
            'cover_image' => 'https://picsum.photos/seed/supplier33/400/400',
            'phone' => '9876570033', 'email' => 'contact@supplier33.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s33->id, 'name' => 'Premium Tiles Model 1', 'slug' => Str::slug('Premium Tiles 161'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 437, 'price_max' => 1141, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product161/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s33->id, 'name' => 'Premium Tiles Model 2', 'slug' => Str::slug('Premium Tiles 162'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 671, 'price_max' => 3579, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product162/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s33->id, 'name' => 'Premium Tiles Model 3', 'slug' => Str::slug('Premium Tiles 163'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 148, 'price_max' => 2423, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product163/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s33->id, 'name' => 'Premium Tiles Model 4', 'slug' => Str::slug('Premium Tiles 164'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 962, 'price_max' => 1691, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product164/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s33->id, 'name' => 'Premium Tiles Model 5', 'slug' => Str::slug('Premium Tiles 165'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 368, 'price_max' => 2724, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product165/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Tiles World Account', 'email' => 'supplier34@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570034']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s34 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Tiles World', 'slug' => Str::slug('Bihar Tiles World-34'),
            'tagline' => 'Top dealer of Tiles in Bhagalpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.9, 'review_count' => 30,
            'cover_image' => 'https://picsum.photos/seed/supplier34/400/400',
            'phone' => '9876570034', 'email' => 'contact@supplier34.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s34->id, 'name' => 'Premium Tiles Model 1', 'slug' => Str::slug('Premium Tiles 166'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 481, 'price_max' => 2002, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product166/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s34->id, 'name' => 'Premium Tiles Model 2', 'slug' => Str::slug('Premium Tiles 167'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 494, 'price_max' => 2437, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product167/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s34->id, 'name' => 'Premium Tiles Model 3', 'slug' => Str::slug('Premium Tiles 168'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 580, 'price_max' => 3822, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product168/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s34->id, 'name' => 'Premium Tiles Model 4', 'slug' => Str::slug('Premium Tiles 169'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 645, 'price_max' => 1652, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product169/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s34->id, 'name' => 'Premium Tiles Model 5', 'slug' => Str::slug('Premium Tiles 170'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 656, 'price_max' => 4141, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product170/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Granite Traders Account', 'email' => 'supplier35@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570035']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s35 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Granite Traders', 'slug' => Str::slug('Magadh Granite Traders-35'),
            'tagline' => 'Top dealer of Granite in Patna. We provide high-quality materials at wholesale rates.',
            'city' => 'Patna', 'district' => 'Patna',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.3, 'review_count' => 122,
            'cover_image' => 'https://picsum.photos/seed/supplier35/400/400',
            'phone' => '9876570035', 'email' => 'contact@supplier35.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s35->id, 'name' => 'Premium Granite Model 1', 'slug' => Str::slug('Premium Granite 171'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 329, 'price_max' => 3540, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product171/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s35->id, 'name' => 'Premium Granite Model 2', 'slug' => Str::slug('Premium Granite 172'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 288, 'price_max' => 1536, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product172/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s35->id, 'name' => 'Premium Granite Model 3', 'slug' => Str::slug('Premium Granite 173'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 580, 'price_max' => 4102, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product173/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s35->id, 'name' => 'Premium Granite Model 4', 'slug' => Str::slug('Premium Granite 174'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 468, 'price_max' => 1227, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product174/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s35->id, 'name' => 'Premium Granite Model 5', 'slug' => Str::slug('Premium Granite 175'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 620, 'price_max' => 4423, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product175/600/600'
            ]);
            
        $u = User::create(['name' => 'Ganga Furniture House Account', 'email' => 'supplier36@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570036']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s36 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Ganga Furniture House', 'slug' => Str::slug('Ganga Furniture House-36'),
            'tagline' => 'Top dealer of Furniture in Muzaffarpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.8, 'review_count' => 20,
            'cover_image' => 'https://picsum.photos/seed/supplier36/400/400',
            'phone' => '9876570036', 'email' => 'contact@supplier36.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s36->id, 'name' => 'Premium Furniture Model 1', 'slug' => Str::slug('Premium Furniture 176'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 159, 'price_max' => 3156, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product176/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s36->id, 'name' => 'Premium Furniture Model 2', 'slug' => Str::slug('Premium Furniture 177'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 938, 'price_max' => 1484, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product177/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s36->id, 'name' => 'Premium Furniture Model 3', 'slug' => Str::slug('Premium Furniture 178'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 612, 'price_max' => 4731, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product178/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s36->id, 'name' => 'Premium Furniture Model 4', 'slug' => Str::slug('Premium Furniture 179'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 786, 'price_max' => 4613, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product179/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s36->id, 'name' => 'Premium Furniture Model 5', 'slug' => Str::slug('Premium Furniture 180'),
                'description' => 'High quality Furniture suitable for all modern constructions.',
                'category' => 'Furniture', 'price_min' => 423, 'price_max' => 3292, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product180/600/600'
            ]);
            
        $u = User::create(['name' => 'Bihar Granite World Account', 'email' => 'supplier37@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570037']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s37 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Granite World', 'slug' => Str::slug('Bihar Granite World-37'),
            'tagline' => 'Top dealer of Granite in Purnia. We provide high-quality materials at wholesale rates.',
            'city' => 'Purnia', 'district' => 'Purnia',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.7, 'review_count' => 38,
            'cover_image' => 'https://picsum.photos/seed/supplier37/400/400',
            'phone' => '9876570037', 'email' => 'contact@supplier37.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s37->id, 'name' => 'Premium Granite Model 1', 'slug' => Str::slug('Premium Granite 181'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 816, 'price_max' => 1942, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product181/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s37->id, 'name' => 'Premium Granite Model 2', 'slug' => Str::slug('Premium Granite 182'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 206, 'price_max' => 3214, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product182/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s37->id, 'name' => 'Premium Granite Model 3', 'slug' => Str::slug('Premium Granite 183'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 939, 'price_max' => 4127, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product183/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s37->id, 'name' => 'Premium Granite Model 4', 'slug' => Str::slug('Premium Granite 184'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 897, 'price_max' => 4058, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product184/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s37->id, 'name' => 'Premium Granite Model 5', 'slug' => Str::slug('Premium Granite 185'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 493, 'price_max' => 4052, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product185/600/600'
            ]);
            
        $u = User::create(['name' => 'Patna Granite Depot Account', 'email' => 'supplier38@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570038']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s38 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Patna Granite Depot', 'slug' => Str::slug('Patna Granite Depot-38'),
            'tagline' => 'Top dealer of Granite in Muzaffarpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.9, 'review_count' => 105,
            'cover_image' => 'https://picsum.photos/seed/supplier38/400/400',
            'phone' => '9876570038', 'email' => 'contact@supplier38.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s38->id, 'name' => 'Premium Granite Model 1', 'slug' => Str::slug('Premium Granite 186'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 130, 'price_max' => 3579, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product186/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s38->id, 'name' => 'Premium Granite Model 2', 'slug' => Str::slug('Premium Granite 187'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 951, 'price_max' => 2537, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product187/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s38->id, 'name' => 'Premium Granite Model 3', 'slug' => Str::slug('Premium Granite 188'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 143, 'price_max' => 4313, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product188/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s38->id, 'name' => 'Premium Granite Model 4', 'slug' => Str::slug('Premium Granite 189'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 897, 'price_max' => 2293, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product189/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s38->id, 'name' => 'Premium Granite Model 5', 'slug' => Str::slug('Premium Granite 190'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 562, 'price_max' => 2706, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product190/600/600'
            ]);
            
        $u = User::create(['name' => 'Magadh Tiles Traders Account', 'email' => 'supplier39@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570039']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s39 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Tiles Traders', 'slug' => Str::slug('Magadh Tiles Traders-39'),
            'tagline' => 'Top dealer of Tiles in Bhagalpur. We provide high-quality materials at wholesale rates.',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.6, 'review_count' => 93,
            'cover_image' => 'https://picsum.photos/seed/supplier39/400/400',
            'phone' => '9876570039', 'email' => 'contact@supplier39.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s39->id, 'name' => 'Premium Tiles Model 1', 'slug' => Str::slug('Premium Tiles 191'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 292, 'price_max' => 2097, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product191/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s39->id, 'name' => 'Premium Tiles Model 2', 'slug' => Str::slug('Premium Tiles 192'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 735, 'price_max' => 2862, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product192/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s39->id, 'name' => 'Premium Tiles Model 3', 'slug' => Str::slug('Premium Tiles 193'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 403, 'price_max' => 1041, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product193/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s39->id, 'name' => 'Premium Tiles Model 4', 'slug' => Str::slug('Premium Tiles 194'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 100, 'price_max' => 3255, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product194/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s39->id, 'name' => 'Premium Tiles Model 5', 'slug' => Str::slug('Premium Tiles 195'),
                'description' => 'High quality Tiles suitable for all modern constructions.',
                'category' => 'Tiles', 'price_min' => 159, 'price_max' => 2175, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product195/600/600'
            ]);
            
        $u = User::create(['name' => 'Granite Emporium Account', 'email' => 'supplier40@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876570040']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $sRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $s40 = Supplier::create([
            'user_id' => $u->id, 'company_name' => 'Granite Emporium', 'slug' => Str::slug('Granite Emporium-40'),
            'tagline' => 'Top dealer of Granite in Gaya. We provide high-quality materials at wholesale rates.',
            'city' => 'Gaya', 'district' => 'Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 124,
            'cover_image' => 'https://picsum.photos/seed/supplier40/400/400',
            'phone' => '9876570040', 'email' => 'contact@supplier40.com'
        ]);
        
            SupplierProduct::create([
                'supplier_id' => $s40->id, 'name' => 'Premium Granite Model 1', 'slug' => Str::slug('Premium Granite 196'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 969, 'price_max' => 1720, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product196/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s40->id, 'name' => 'Premium Granite Model 2', 'slug' => Str::slug('Premium Granite 197'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 787, 'price_max' => 4223, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product197/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s40->id, 'name' => 'Premium Granite Model 3', 'slug' => Str::slug('Premium Granite 198'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 248, 'price_max' => 3103, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product198/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s40->id, 'name' => 'Premium Granite Model 4', 'slug' => Str::slug('Premium Granite 199'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 628, 'price_max' => 1693, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product199/600/600'
            ]);
            
            SupplierProduct::create([
                'supplier_id' => $s40->id, 'name' => 'Premium Granite Model 5', 'slug' => Str::slug('Premium Granite 200'),
                'description' => 'High quality Granite suitable for all modern constructions.',
                'category' => 'Granite', 'price_min' => 971, 'price_max' => 2359, 'unit' => 'piece',
                'is_active' => true,
                'cover_image' => 'https://picsum.photos/seed/product200/600/600'
            ]);
              }
}
