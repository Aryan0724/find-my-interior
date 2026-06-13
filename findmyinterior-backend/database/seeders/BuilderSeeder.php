<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Builder;
use App\Models\BuilderProject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class BuilderSeeder extends Seeder {
  public function run(): void {
  Builder::unguard();
  BuilderProject::unguard();
  $bRoleId = DB::table('roles')->where('slug', 'builder')->value('id');

        $u = User::create(['name' => 'Magadh Builders Account', 'email' => 'builder1@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560001']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b1 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Magadh Builders', 'slug' => Str::slug('Magadh Builders-1'),
            'tagline' => 'Building the future of Patna',
            'city' => 'Patna', 'district' => 'Patna', 'established_year' => 2020,
            'rera_number' => 'BR/RERA/7275', 'total_projects' => 10,
            'is_featured' => true,
            'avg_rating' => 3.6, 'review_count' => 280,
            'cover_image' => 'https://picsum.photos/seed/builder1/400/400',
            'phone' => '9876560001', 'email' => 'contact@builder1.com'
        ]);
        
        $u = User::create(['name' => 'Patna Infra Projects Account', 'email' => 'builder2@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560002']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b2 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Patna Infra Projects', 'slug' => Str::slug('Patna Infra Projects-2'),
            'tagline' => 'Building the future of Muzaffarpur',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'established_year' => 2018,
            'rera_number' => 'BR/RERA/9661', 'total_projects' => 2,
            'is_featured' => true,
            'avg_rating' => 4.5, 'review_count' => 176,
            'cover_image' => 'https://picsum.photos/seed/builder2/400/400',
            'phone' => '9876560002', 'email' => 'contact@builder2.com'
        ]);
        
        $u = User::create(['name' => 'Ganga Realtors Account', 'email' => 'builder3@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560003']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b3 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Ganga Realtors', 'slug' => Str::slug('Ganga Realtors-3'),
            'tagline' => 'Building the future of Gaya',
            'city' => 'Gaya', 'district' => 'Gaya', 'established_year' => 2000,
            'rera_number' => null, 'total_projects' => 6,
            'is_featured' => true,
            'avg_rating' => 3.7, 'review_count' => 261,
            'cover_image' => 'https://picsum.photos/seed/builder3/400/400',
            'phone' => '9876560003', 'email' => 'contact@builder3.com'
        ]);
        
        $u = User::create(['name' => 'Mithila Build Estate Account', 'email' => 'builder4@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560004']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b4 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Mithila Build Estate', 'slug' => Str::slug('Mithila Build Estate-4'),
            'tagline' => 'Building the future of Darbhanga',
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'established_year' => 2003,
            'rera_number' => null, 'total_projects' => 3,
            'is_featured' => true,
            'avg_rating' => 3.8, 'review_count' => 250,
            'cover_image' => 'https://picsum.photos/seed/builder4/400/400',
            'phone' => '9876560004', 'email' => 'contact@builder4.com'
        ]);
        
        $u = User::create(['name' => 'Nalanda Smart Homes Account', 'email' => 'builder5@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560005']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b5 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Nalanda Smart Homes', 'slug' => Str::slug('Nalanda Smart Homes-5'),
            'tagline' => 'Building the future of Darbhanga',
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'established_year' => 2020,
            'rera_number' => 'BR/RERA/1273', 'total_projects' => 2,
            'is_featured' => false,
            'avg_rating' => 4.3, 'review_count' => 189,
            'cover_image' => 'https://picsum.photos/seed/builder5/400/400',
            'phone' => '9876560005', 'email' => 'contact@builder5.com'
        ]);
        
        $u = User::create(['name' => 'Bhagalpur Township Account', 'email' => 'builder6@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560006']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b6 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Bhagalpur Township', 'slug' => Str::slug('Bhagalpur Township-6'),
            'tagline' => 'Building the future of Darbhanga',
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'established_year' => 2008,
            'rera_number' => 'BR/RERA/8601', 'total_projects' => 3,
            'is_featured' => false,
            'avg_rating' => 3.7, 'review_count' => 237,
            'cover_image' => 'https://picsum.photos/seed/builder6/400/400',
            'phone' => '9876560006', 'email' => 'contact@builder6.com'
        ]);
        
        $u = User::create(['name' => 'Gaya Lotus Constructions Account', 'email' => 'builder7@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560007']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b7 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Gaya Lotus Constructions', 'slug' => Str::slug('Gaya Lotus Constructions-7'),
            'tagline' => 'Building the future of Patna',
            'city' => 'Patna', 'district' => 'Patna', 'established_year' => 2001,
            'rera_number' => 'BR/RERA/8635', 'total_projects' => 4,
            'is_featured' => true,
            'avg_rating' => 4.7, 'review_count' => 126,
            'cover_image' => 'https://picsum.photos/seed/builder7/400/400',
            'phone' => '9876560007', 'email' => 'contact@builder7.com'
        ]);
        
        $u = User::create(['name' => 'Purnia Dream Homes Account', 'email' => 'builder8@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560008']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b8 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Purnia Dream Homes', 'slug' => Str::slug('Purnia Dream Homes-8'),
            'tagline' => 'Building the future of Patna',
            'city' => 'Patna', 'district' => 'Patna', 'established_year' => 2011,
            'rera_number' => 'BR/RERA/3918', 'total_projects' => 5,
            'is_featured' => true,
            'avg_rating' => 4.7, 'review_count' => 104,
            'cover_image' => 'https://picsum.photos/seed/builder8/400/400',
            'phone' => '9876560008', 'email' => 'contact@builder8.com'
        ]);
        
        $u = User::create(['name' => 'Bihar Heights Account', 'email' => 'builder9@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560009']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b9 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Bihar Heights', 'slug' => Str::slug('Bihar Heights-9'),
            'tagline' => 'Building the future of Darbhanga',
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'established_year' => 2002,
            'rera_number' => 'BR/RERA/5590', 'total_projects' => 9,
            'is_featured' => false,
            'avg_rating' => 3.5, 'review_count' => 232,
            'cover_image' => 'https://picsum.photos/seed/builder9/400/400',
            'phone' => '9876560009', 'email' => 'contact@builder9.com'
        ]);
        
        $u = User::create(['name' => 'Kosi Developers Account', 'email' => 'builder10@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560010']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b10 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Kosi Developers', 'slug' => Str::slug('Kosi Developers-10'),
            'tagline' => 'Building the future of Patna',
            'city' => 'Patna', 'district' => 'Patna', 'established_year' => 2010,
            'rera_number' => 'BR/RERA/7082', 'total_projects' => 10,
            'is_featured' => true,
            'avg_rating' => 4.8, 'review_count' => 78,
            'cover_image' => 'https://picsum.photos/seed/builder10/400/400',
            'phone' => '9876560010', 'email' => 'contact@builder10.com'
        ]);
        
        $u = User::create(['name' => 'Sonbhadra Builders Account', 'email' => 'builder11@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560011']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b11 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Sonbhadra Builders', 'slug' => Str::slug('Sonbhadra Builders-11'),
            'tagline' => 'Building the future of Purnia',
            'city' => 'Purnia', 'district' => 'Purnia', 'established_year' => 2015,
            'rera_number' => null, 'total_projects' => 5,
            'is_featured' => true,
            'avg_rating' => 3.9, 'review_count' => 243,
            'cover_image' => 'https://picsum.photos/seed/builder11/400/400',
            'phone' => '9876560011', 'email' => 'contact@builder11.com'
        ]);
        
        $u = User::create(['name' => 'Maurya Enclave Account', 'email' => 'builder12@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560012']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b12 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Maurya Enclave', 'slug' => Str::slug('Maurya Enclave-12'),
            'tagline' => 'Building the future of Muzaffarpur',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'established_year' => 2017,
            'rera_number' => 'BR/RERA/3280', 'total_projects' => 7,
            'is_featured' => false,
            'avg_rating' => 3.9, 'review_count' => 238,
            'cover_image' => 'https://picsum.photos/seed/builder12/400/400',
            'phone' => '9876560012', 'email' => 'contact@builder12.com'
        ]);
        
        $u = User::create(['name' => 'Ashoka Builders Account', 'email' => 'builder13@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560013']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b13 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Ashoka Builders', 'slug' => Str::slug('Ashoka Builders-13'),
            'tagline' => 'Building the future of Bhagalpur',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'established_year' => 2007,
            'rera_number' => 'BR/RERA/2639', 'total_projects' => 9,
            'is_featured' => true,
            'avg_rating' => 3.9, 'review_count' => 72,
            'cover_image' => 'https://picsum.photos/seed/builder13/400/400',
            'phone' => '9876560013', 'email' => 'contact@builder13.com'
        ]);
        
        $u = User::create(['name' => 'Aryabhatta Constructions Account', 'email' => 'builder14@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560014']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b14 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Aryabhatta Constructions', 'slug' => Str::slug('Aryabhatta Constructions-14'),
            'tagline' => 'Building the future of Bhagalpur',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'established_year' => 2019,
            'rera_number' => 'BR/RERA/7916', 'total_projects' => 6,
            'is_featured' => false,
            'avg_rating' => 3.8, 'review_count' => 37,
            'cover_image' => 'https://picsum.photos/seed/builder14/400/400',
            'phone' => '9876560014', 'email' => 'contact@builder14.com'
        ]);
        
        $u = User::create(['name' => 'Vikramshila Realty Account', 'email' => 'builder15@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560015']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b15 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Vikramshila Realty', 'slug' => Str::slug('Vikramshila Realty-15'),
            'tagline' => 'Building the future of Muzaffarpur',
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'established_year' => 2010,
            'rera_number' => 'BR/RERA/5385', 'total_projects' => 9,
            'is_featured' => false,
            'avg_rating' => 4.7, 'review_count' => 282,
            'cover_image' => 'https://picsum.photos/seed/builder15/400/400',
            'phone' => '9876560015', 'email' => 'contact@builder15.com'
        ]);
        
        $u = User::create(['name' => 'Tirhut Projects Account', 'email' => 'builder16@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560016']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b16 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Tirhut Projects', 'slug' => Str::slug('Tirhut Projects-16'),
            'tagline' => 'Building the future of Bhagalpur',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'established_year' => 2014,
            'rera_number' => 'BR/RERA/7209', 'total_projects' => 10,
            'is_featured' => true,
            'avg_rating' => 3.7, 'review_count' => 194,
            'cover_image' => 'https://picsum.photos/seed/builder16/400/400',
            'phone' => '9876560016', 'email' => 'contact@builder16.com'
        ]);
        
        $u = User::create(['name' => 'Bhojpur City Builders Account', 'email' => 'builder17@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560017']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b17 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Bhojpur City Builders', 'slug' => Str::slug('Bhojpur City Builders-17'),
            'tagline' => 'Building the future of Darbhanga',
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'established_year' => 2018,
            'rera_number' => 'BR/RERA/4397', 'total_projects' => 3,
            'is_featured' => true,
            'avg_rating' => 4.1, 'review_count' => 253,
            'cover_image' => 'https://picsum.photos/seed/builder17/400/400',
            'phone' => '9876560017', 'email' => 'contact@builder17.com'
        ]);
        
        $u = User::create(['name' => 'Champaran Green Homes Account', 'email' => 'builder18@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560018']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b18 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Champaran Green Homes', 'slug' => Str::slug('Champaran Green Homes-18'),
            'tagline' => 'Building the future of Bhagalpur',
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'established_year' => 2017,
            'rera_number' => 'BR/RERA/5178', 'total_projects' => 5,
            'is_featured' => true,
            'avg_rating' => 3.7, 'review_count' => 252,
            'cover_image' => 'https://picsum.photos/seed/builder18/400/400',
            'phone' => '9876560018', 'email' => 'contact@builder18.com'
        ]);
        
        $u = User::create(['name' => 'Vaishali Heritage Account', 'email' => 'builder19@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560019']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b19 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Vaishali Heritage', 'slug' => Str::slug('Vaishali Heritage-19'),
            'tagline' => 'Building the future of Darbhanga',
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'established_year' => 2005,
            'rera_number' => null, 'total_projects' => 5,
            'is_featured' => false,
            'avg_rating' => 3.6, 'review_count' => 65,
            'cover_image' => 'https://picsum.photos/seed/builder19/400/400',
            'phone' => '9876560019', 'email' => 'contact@builder19.com'
        ]);
        
        $u = User::create(['name' => 'Rajgir Smart City Account', 'email' => 'builder20@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876560020']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        $b20 = Builder::create([
            'user_id' => $u->id, 'company_name' => 'Rajgir Smart City', 'slug' => Str::slug('Rajgir Smart City-20'),
            'tagline' => 'Building the future of Gaya',
            'city' => 'Gaya', 'district' => 'Gaya', 'established_year' => 2014,
            'rera_number' => 'BR/RERA/4441', 'total_projects' => 7,
            'is_featured' => true,
            'avg_rating' => 3.7, 'review_count' => 146,
            'cover_image' => 'https://picsum.photos/seed/builder20/400/400',
            'phone' => '9876560020', 'email' => 'contact@builder20.com'
        ]);
        
        BuilderProject::create([
            'builder_id' => $b3->id, 'title' => 'Mixed Use Development in Purnia', 'slug' => Str::slug('Project 1 Purnia'),
            'description' => 'A luxurious residential project located in the heart of Purnia. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Purnia Center', 'city' => 'Purnia',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3400000, 'price_max' => 11600000,
            'status' => 'possession_ready', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project1/800/500',
            'possession_date' => now()->addMonths(22), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b2->id, 'title' => 'Mixed Use Development in Purnia', 'slug' => Str::slug('Project 2 Purnia'),
            'description' => 'A luxurious mixed project located in the heart of Purnia. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Purnia Center', 'city' => 'Purnia',
            'bhk_options' => null, 'price_min' => 4200000, 'price_max' => 14800000,
            'status' => 'upcoming', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project2/800/500',
            'possession_date' => now()->addMonths(7), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b16->id, 'title' => 'Mixed Use Development in Muzaffarpur', 'slug' => Str::slug('Project 3 Muzaffarpur'),
            'description' => 'A luxurious residential project located in the heart of Muzaffarpur. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Muzaffarpur Center', 'city' => 'Muzaffarpur',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3100000, 'price_max' => 14200000,
            'status' => 'completed', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project3/800/500',
            'possession_date' => now()->addMonths(12), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b19->id, 'title' => 'Residential Apartments in Purnia', 'slug' => Str::slug('Project 4 Purnia'),
            'description' => 'A luxurious residential project located in the heart of Purnia. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Purnia Center', 'city' => 'Purnia',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3300000, 'price_max' => 11000000,
            'status' => 'ongoing', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project4/800/500',
            'possession_date' => now()->addMonths(17), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b3->id, 'title' => 'Mixed Use Development in Purnia', 'slug' => Str::slug('Project 5 Purnia'),
            'description' => 'A luxurious mixed project located in the heart of Purnia. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Purnia Center', 'city' => 'Purnia',
            'bhk_options' => null, 'price_min' => 5100000, 'price_max' => 14600000,
            'status' => 'completed', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project5/800/500',
            'possession_date' => now()->addMonths(-12), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b20->id, 'title' => 'Mixed Use Development in Bhagalpur', 'slug' => Str::slug('Project 6 Bhagalpur'),
            'description' => 'A luxurious commercial project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 4200000, 'price_max' => 12300000,
            'status' => 'ongoing', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project6/800/500',
            'possession_date' => now()->addMonths(12), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b18->id, 'title' => 'Commercial Complex in Muzaffarpur', 'slug' => Str::slug('Project 7 Muzaffarpur'),
            'description' => 'A luxurious commercial project located in the heart of Muzaffarpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Muzaffarpur Center', 'city' => 'Muzaffarpur',
            'bhk_options' => null, 'price_min' => 3200000, 'price_max' => 9100000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project7/800/500',
            'possession_date' => now()->addMonths(5), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b1->id, 'title' => 'Residential Apartments in Bhagalpur', 'slug' => Str::slug('Project 8 Bhagalpur'),
            'description' => 'A luxurious mixed project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 4700000, 'price_max' => 13100000,
            'status' => 'ongoing', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project8/800/500',
            'possession_date' => now()->addMonths(17), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b14->id, 'title' => 'Commercial Complex in Gaya', 'slug' => Str::slug('Project 9 Gaya'),
            'description' => 'A luxurious mixed project located in the heart of Gaya. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Gaya Center', 'city' => 'Gaya',
            'bhk_options' => null, 'price_min' => 3400000, 'price_max' => 7900000,
            'status' => 'completed', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project9/800/500',
            'possession_date' => now()->addMonths(23), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b9->id, 'title' => 'Villas in Darbhanga', 'slug' => Str::slug('Project 10 Darbhanga'),
            'description' => 'A luxurious commercial project located in the heart of Darbhanga. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Darbhanga Center', 'city' => 'Darbhanga',
            'bhk_options' => null, 'price_min' => 3700000, 'price_max' => 11800000,
            'status' => 'completed', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project10/800/500',
            'possession_date' => now()->addMonths(4), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b17->id, 'title' => 'Residential Apartments in Muzaffarpur', 'slug' => Str::slug('Project 11 Muzaffarpur'),
            'description' => 'A luxurious mixed project located in the heart of Muzaffarpur. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Muzaffarpur Center', 'city' => 'Muzaffarpur',
            'bhk_options' => null, 'price_min' => 4400000, 'price_max' => 14700000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project11/800/500',
            'possession_date' => now()->addMonths(22), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b6->id, 'title' => 'Mixed Use Development in Gaya', 'slug' => Str::slug('Project 12 Gaya'),
            'description' => 'A luxurious residential project located in the heart of Gaya. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Gaya Center', 'city' => 'Gaya',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3500000, 'price_max' => 10300000,
            'status' => 'possession_ready', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project12/800/500',
            'possession_date' => now()->addMonths(11), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b4->id, 'title' => 'Commercial Complex in Patna', 'slug' => Str::slug('Project 13 Patna'),
            'description' => 'A luxurious mixed project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => null, 'price_min' => 3600000, 'price_max' => 9200000,
            'status' => 'completed', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project13/800/500',
            'possession_date' => now()->addMonths(-6), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b11->id, 'title' => 'Mixed Use Development in Patna', 'slug' => Str::slug('Project 14 Patna'),
            'description' => 'A luxurious mixed project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => null, 'price_min' => 5200000, 'price_max' => 12400000,
            'status' => 'ongoing', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project14/800/500',
            'possession_date' => now()->addMonths(18), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b4->id, 'title' => 'Mixed Use Development in Purnia', 'slug' => Str::slug('Project 15 Purnia'),
            'description' => 'A luxurious residential project located in the heart of Purnia. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Purnia Center', 'city' => 'Purnia',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3800000, 'price_max' => 12900000,
            'status' => 'ongoing', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project15/800/500',
            'possession_date' => now()->addMonths(5), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b2->id, 'title' => 'Villas in Bhagalpur', 'slug' => Str::slug('Project 16 Bhagalpur'),
            'description' => 'A luxurious mixed project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 3500000, 'price_max' => 7300000,
            'status' => 'possession_ready', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project16/800/500',
            'possession_date' => now()->addMonths(19), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b9->id, 'title' => 'Mixed Use Development in Bhagalpur', 'slug' => Str::slug('Project 17 Bhagalpur'),
            'description' => 'A luxurious commercial project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 4900000, 'price_max' => 11400000,
            'status' => 'ongoing', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project17/800/500',
            'possession_date' => now()->addMonths(5), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b5->id, 'title' => 'Commercial Complex in Bhagalpur', 'slug' => Str::slug('Project 18 Bhagalpur'),
            'description' => 'A luxurious commercial project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 4100000, 'price_max' => 8300000,
            'status' => 'ongoing', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project18/800/500',
            'possession_date' => now()->addMonths(0), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b4->id, 'title' => 'Villas in Purnia', 'slug' => Str::slug('Project 19 Purnia'),
            'description' => 'A luxurious residential project located in the heart of Purnia. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Purnia Center', 'city' => 'Purnia',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 5000000, 'price_max' => 10300000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project19/800/500',
            'possession_date' => now()->addMonths(5), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b13->id, 'title' => 'Villas in Patna', 'slug' => Str::slug('Project 20 Patna'),
            'description' => 'A luxurious commercial project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => null, 'price_min' => 4400000, 'price_max' => 11700000,
            'status' => 'completed', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project20/800/500',
            'possession_date' => now()->addMonths(12), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b11->id, 'title' => 'Residential Apartments in Patna', 'slug' => Str::slug('Project 21 Patna'),
            'description' => 'A luxurious residential project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 4100000, 'price_max' => 7900000,
            'status' => 'possession_ready', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project21/800/500',
            'possession_date' => now()->addMonths(21), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b11->id, 'title' => 'Commercial Complex in Patna', 'slug' => Str::slug('Project 22 Patna'),
            'description' => 'A luxurious residential project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 5100000, 'price_max' => 14800000,
            'status' => 'possession_ready', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project22/800/500',
            'possession_date' => now()->addMonths(-1), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b17->id, 'title' => 'Commercial Complex in Darbhanga', 'slug' => Str::slug('Project 23 Darbhanga'),
            'description' => 'A luxurious residential project located in the heart of Darbhanga. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Darbhanga Center', 'city' => 'Darbhanga',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 4800000, 'price_max' => 11400000,
            'status' => 'possession_ready', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project23/800/500',
            'possession_date' => now()->addMonths(2), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b11->id, 'title' => 'Residential Apartments in Gaya', 'slug' => Str::slug('Project 24 Gaya'),
            'description' => 'A luxurious residential project located in the heart of Gaya. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Gaya Center', 'city' => 'Gaya',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 4400000, 'price_max' => 11800000,
            'status' => 'completed', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project24/800/500',
            'possession_date' => now()->addMonths(19), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b1->id, 'title' => 'Villas in Darbhanga', 'slug' => Str::slug('Project 25 Darbhanga'),
            'description' => 'A luxurious commercial project located in the heart of Darbhanga. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Darbhanga Center', 'city' => 'Darbhanga',
            'bhk_options' => null, 'price_min' => 4300000, 'price_max' => 7100000,
            'status' => 'possession_ready', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project25/800/500',
            'possession_date' => now()->addMonths(-1), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b18->id, 'title' => 'Commercial Complex in Bhagalpur', 'slug' => Str::slug('Project 26 Bhagalpur'),
            'description' => 'A luxurious residential project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3500000, 'price_max' => 8700000,
            'status' => 'upcoming', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project26/800/500',
            'possession_date' => now()->addMonths(19), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b16->id, 'title' => 'Villas in Bhagalpur', 'slug' => Str::slug('Project 27 Bhagalpur'),
            'description' => 'A luxurious commercial project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 3900000, 'price_max' => 9000000,
            'status' => 'ongoing', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project27/800/500',
            'possession_date' => now()->addMonths(-9), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b8->id, 'title' => 'Villas in Patna', 'slug' => Str::slug('Project 28 Patna'),
            'description' => 'A luxurious mixed project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => null, 'price_min' => 3700000, 'price_max' => 10700000,
            'status' => 'possession_ready', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project28/800/500',
            'possession_date' => now()->addMonths(5), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b7->id, 'title' => 'Commercial Complex in Bhagalpur', 'slug' => Str::slug('Project 29 Bhagalpur'),
            'description' => 'A luxurious commercial project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 5500000, 'price_max' => 11900000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project29/800/500',
            'possession_date' => now()->addMonths(-5), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b18->id, 'title' => 'Villas in Gaya', 'slug' => Str::slug('Project 30 Gaya'),
            'description' => 'A luxurious mixed project located in the heart of Gaya. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Gaya Center', 'city' => 'Gaya',
            'bhk_options' => null, 'price_min' => 4600000, 'price_max' => 7100000,
            'status' => 'upcoming', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project30/800/500',
            'possession_date' => now()->addMonths(0), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b3->id, 'title' => 'Residential Apartments in Patna', 'slug' => Str::slug('Project 31 Patna'),
            'description' => 'A luxurious commercial project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => null, 'price_min' => 3700000, 'price_max' => 12900000,
            'status' => 'ongoing', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project31/800/500',
            'possession_date' => now()->addMonths(12), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b7->id, 'title' => 'Villas in Patna', 'slug' => Str::slug('Project 32 Patna'),
            'description' => 'A luxurious residential project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3300000, 'price_max' => 13800000,
            'status' => 'ongoing', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project32/800/500',
            'possession_date' => now()->addMonths(8), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b9->id, 'title' => 'Commercial Complex in Muzaffarpur', 'slug' => Str::slug('Project 33 Muzaffarpur'),
            'description' => 'A luxurious mixed project located in the heart of Muzaffarpur. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Muzaffarpur Center', 'city' => 'Muzaffarpur',
            'bhk_options' => null, 'price_min' => 5700000, 'price_max' => 12000000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project33/800/500',
            'possession_date' => now()->addMonths(-1), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b12->id, 'title' => 'Villas in Gaya', 'slug' => Str::slug('Project 34 Gaya'),
            'description' => 'A luxurious residential project located in the heart of Gaya. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Gaya Center', 'city' => 'Gaya',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 5300000, 'price_max' => 13500000,
            'status' => 'completed', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project34/800/500',
            'possession_date' => now()->addMonths(12), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b17->id, 'title' => 'Villas in Bhagalpur', 'slug' => Str::slug('Project 35 Bhagalpur'),
            'description' => 'A luxurious mixed project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 5300000, 'price_max' => 7700000,
            'status' => 'possession_ready', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project35/800/500',
            'possession_date' => now()->addMonths(5), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b13->id, 'title' => 'Mixed Use Development in Darbhanga', 'slug' => Str::slug('Project 36 Darbhanga'),
            'description' => 'A luxurious mixed project located in the heart of Darbhanga. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Darbhanga Center', 'city' => 'Darbhanga',
            'bhk_options' => null, 'price_min' => 3200000, 'price_max' => 9800000,
            'status' => 'possession_ready', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project36/800/500',
            'possession_date' => now()->addMonths(14), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b11->id, 'title' => 'Mixed Use Development in Gaya', 'slug' => Str::slug('Project 37 Gaya'),
            'description' => 'A luxurious residential project located in the heart of Gaya. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Gaya Center', 'city' => 'Gaya',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3400000, 'price_max' => 9300000,
            'status' => 'completed', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project37/800/500',
            'possession_date' => now()->addMonths(19), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b11->id, 'title' => 'Residential Apartments in Bhagalpur', 'slug' => Str::slug('Project 38 Bhagalpur'),
            'description' => 'A luxurious commercial project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 3900000, 'price_max' => 13000000,
            'status' => 'ongoing', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project38/800/500',
            'possession_date' => now()->addMonths(22), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b4->id, 'title' => 'Commercial Complex in Darbhanga', 'slug' => Str::slug('Project 39 Darbhanga'),
            'description' => 'A luxurious commercial project located in the heart of Darbhanga. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Darbhanga Center', 'city' => 'Darbhanga',
            'bhk_options' => null, 'price_min' => 5400000, 'price_max' => 13400000,
            'status' => 'possession_ready', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project39/800/500',
            'possession_date' => now()->addMonths(-6), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b14->id, 'title' => 'Villas in Darbhanga', 'slug' => Str::slug('Project 40 Darbhanga'),
            'description' => 'A luxurious mixed project located in the heart of Darbhanga. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Darbhanga Center', 'city' => 'Darbhanga',
            'bhk_options' => null, 'price_min' => 3700000, 'price_max' => 13100000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project40/800/500',
            'possession_date' => now()->addMonths(22), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b11->id, 'title' => 'Villas in Bhagalpur', 'slug' => Str::slug('Project 41 Bhagalpur'),
            'description' => 'A luxurious residential project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3600000, 'price_max' => 7700000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project41/800/500',
            'possession_date' => now()->addMonths(19), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b11->id, 'title' => 'Mixed Use Development in Muzaffarpur', 'slug' => Str::slug('Project 42 Muzaffarpur'),
            'description' => 'A luxurious commercial project located in the heart of Muzaffarpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Muzaffarpur Center', 'city' => 'Muzaffarpur',
            'bhk_options' => null, 'price_min' => 3900000, 'price_max' => 7300000,
            'status' => 'completed', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project42/800/500',
            'possession_date' => now()->addMonths(-4), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b5->id, 'title' => 'Residential Apartments in Darbhanga', 'slug' => Str::slug('Project 43 Darbhanga'),
            'description' => 'A luxurious residential project located in the heart of Darbhanga. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Darbhanga Center', 'city' => 'Darbhanga',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 3400000, 'price_max' => 7800000,
            'status' => 'ongoing', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project43/800/500',
            'possession_date' => now()->addMonths(5), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b1->id, 'title' => 'Villas in Patna', 'slug' => Str::slug('Project 44 Patna'),
            'description' => 'A luxurious residential project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 4200000, 'price_max' => 12900000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project44/800/500',
            'possession_date' => now()->addMonths(-4), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b10->id, 'title' => 'Residential Apartments in Patna', 'slug' => Str::slug('Project 45 Patna'),
            'description' => 'A luxurious mixed project located in the heart of Patna. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Patna Center', 'city' => 'Patna',
            'bhk_options' => null, 'price_min' => 5500000, 'price_max' => 10500000,
            'status' => 'possession_ready', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project45/800/500',
            'possession_date' => now()->addMonths(8), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b9->id, 'title' => 'Villas in Bhagalpur', 'slug' => Str::slug('Project 46 Bhagalpur'),
            'description' => 'A luxurious commercial project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 4000000, 'price_max' => 13900000,
            'status' => 'completed', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project46/800/500',
            'possession_date' => now()->addMonths(-11), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b10->id, 'title' => 'Mixed Use Development in Muzaffarpur', 'slug' => Str::slug('Project 47 Muzaffarpur'),
            'description' => 'A luxurious mixed project located in the heart of Muzaffarpur. Modern amenities included.',
            'project_type' => 'mixed', 'location' => 'Muzaffarpur Center', 'city' => 'Muzaffarpur',
            'bhk_options' => null, 'price_min' => 5600000, 'price_max' => 13600000,
            'status' => 'completed', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project47/800/500',
            'possession_date' => now()->addMonths(17), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b12->id, 'title' => 'Villas in Darbhanga', 'slug' => Str::slug('Project 48 Darbhanga'),
            'description' => 'A luxurious residential project located in the heart of Darbhanga. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Darbhanga Center', 'city' => 'Darbhanga',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 5400000, 'price_max' => 10200000,
            'status' => 'completed', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project48/800/500',
            'possession_date' => now()->addMonths(13), 'is_possession_ready' => true
        ]);
        
        BuilderProject::create([
            'builder_id' => $b20->id, 'title' => 'Villas in Bhagalpur', 'slug' => Str::slug('Project 49 Bhagalpur'),
            'description' => 'A luxurious commercial project located in the heart of Bhagalpur. Modern amenities included.',
            'project_type' => 'commercial', 'location' => 'Bhagalpur Center', 'city' => 'Bhagalpur',
            'bhk_options' => null, 'price_min' => 5800000, 'price_max' => 9900000,
            'status' => 'upcoming', 'is_featured' => true,
            'cover_image' => 'https://picsum.photos/seed/project49/800/500',
            'possession_date' => now()->addMonths(19), 'is_possession_ready' => false
        ]);
        
        BuilderProject::create([
            'builder_id' => $b3->id, 'title' => 'Mixed Use Development in Gaya', 'slug' => Str::slug('Project 50 Gaya'),
            'description' => 'A luxurious residential project located in the heart of Gaya. Modern amenities included.',
            'project_type' => 'residential', 'location' => 'Gaya Center', 'city' => 'Gaya',
            'bhk_options' => '2BHK, 3BHK', 'price_min' => 5200000, 'price_max' => 10600000,
            'status' => 'upcoming', 'is_featured' => false,
            'cover_image' => 'https://picsum.photos/seed/project50/800/500',
            'possession_date' => now()->addMonths(0), 'is_possession_ready' => false
        ]);
          }
}
