<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class MarketplaceSeeder extends Seeder {
  public function run(): void {
  Listing::unguard();
  $bizRoleId = DB::table('roles')->where('slug', 'business')->value('id');

        $u = User::create(['name' => 'Purnia Interior Studio Account', 'email' => 'designer1@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540001']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Purnia Interior Studio', 'slug' => Str::slug('Purnia Interior Studio-1'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 9,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.0, 'review_count' => 26,
            'cover_image' => 'https://picsum.photos/seed/designer1/400/400'
        ]);
        
        $u = User::create(['name' => 'Bihar Gaya Works Account', 'email' => 'designer2@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540002']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Bihar Gaya Works', 'slug' => Str::slug('Bihar Gaya Works-2'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 17,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 5.0, 'review_count' => 50,
            'cover_image' => 'https://picsum.photos/seed/designer2/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Decor Hub Account', 'email' => 'designer3@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540003']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Purnia Decor Hub', 'slug' => Str::slug('Purnia Decor Hub-3'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 18,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.8, 'review_count' => 17,
            'cover_image' => 'https://picsum.photos/seed/designer3/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Elite Interiors Account', 'email' => 'designer4@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540004']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Gaya Elite Interiors', 'slug' => Str::slug('Gaya Elite Interiors-4'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 17,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 20,
            'cover_image' => 'https://picsum.photos/seed/designer4/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Gaya Solutions Account', 'email' => 'designer5@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540005']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Gaya Solutions', 'slug' => Str::slug('Patliputra Gaya Solutions-5'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 10,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.0, 'review_count' => 53,
            'cover_image' => 'https://picsum.photos/seed/designer5/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Space Planners Account', 'email' => 'designer6@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540006']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Muzaffarpur Space Planners', 'slug' => Str::slug('Muzaffarpur Space Planners-6'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 3,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 5.0, 'review_count' => 78,
            'cover_image' => 'https://picsum.photos/seed/designer6/400/400'
        ]);
        
        $u = User::create(['name' => 'Darbhanga Interior Studio Account', 'email' => 'designer7@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540007']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Darbhanga Interior Studio', 'slug' => Str::slug('Darbhanga Interior Studio-7'),
            'description' => 'We are the leading interior designers in Darbhanga. Specializing in modern residential and commercial designs.',
            'years_experience' => 6,
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'address' => 'Main Road, Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.0, 'review_count' => 116,
            'cover_image' => 'https://picsum.photos/seed/designer7/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Muzaffarpur Solutions Account', 'email' => 'designer8@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540008']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Muzaffarpur Solutions', 'slug' => Str::slug('Patliputra Muzaffarpur Solutions-8'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 15,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.0, 'review_count' => 16,
            'cover_image' => 'https://picsum.photos/seed/designer8/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Gaya Solutions Account', 'email' => 'designer9@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540009']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Gaya Solutions', 'slug' => Str::slug('Patliputra Gaya Solutions-9'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 11,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.2, 'review_count' => 45,
            'cover_image' => 'https://picsum.photos/seed/designer9/400/400'
        ]);
        
        $u = User::create(['name' => 'Bhagalpur Interior Studio Account', 'email' => 'designer10@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540010']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Bhagalpur Interior Studio', 'slug' => Str::slug('Bhagalpur Interior Studio-10'),
            'description' => 'We are the leading interior designers in Bhagalpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 7,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Main Road, Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 137,
            'cover_image' => 'https://picsum.photos/seed/designer10/400/400'
        ]);
        
        $u = User::create(['name' => 'Darbhanga Space Planners Account', 'email' => 'designer11@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540011']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Darbhanga Space Planners', 'slug' => Str::slug('Darbhanga Space Planners-11'),
            'description' => 'We are the leading interior designers in Darbhanga. Specializing in modern residential and commercial designs.',
            'years_experience' => 3,
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'address' => 'Main Road, Darbhanga',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.6, 'review_count' => 91,
            'cover_image' => 'https://picsum.photos/seed/designer11/400/400'
        ]);
        
        $u = User::create(['name' => 'Patna Royal Designs Account', 'email' => 'designer12@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540012']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patna Royal Designs', 'slug' => Str::slug('Patna Royal Designs-12'),
            'description' => 'We are the leading interior designers in Patna. Specializing in modern residential and commercial designs.',
            'years_experience' => 12,
            'city' => 'Patna', 'district' => 'Patna', 'address' => 'Main Road, Patna',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.9, 'review_count' => 27,
            'cover_image' => 'https://picsum.photos/seed/designer12/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Decor Hub Account', 'email' => 'designer13@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540013']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Muzaffarpur Decor Hub', 'slug' => Str::slug('Muzaffarpur Decor Hub-13'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 19,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.4, 'review_count' => 75,
            'cover_image' => 'https://picsum.photos/seed/designer13/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Muzaffarpur Solutions Account', 'email' => 'designer14@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540014']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Muzaffarpur Solutions', 'slug' => Str::slug('Patliputra Muzaffarpur Solutions-14'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 3,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.7, 'review_count' => 21,
            'cover_image' => 'https://picsum.photos/seed/designer14/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Interior Studio Account', 'email' => 'designer15@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540015']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Purnia Interior Studio', 'slug' => Str::slug('Purnia Interior Studio-15'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 6,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.3, 'review_count' => 60,
            'cover_image' => 'https://picsum.photos/seed/designer15/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Gaya Solutions Account', 'email' => 'designer16@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540016']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Gaya Solutions', 'slug' => Str::slug('Patliputra Gaya Solutions-16'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 7,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 138,
            'cover_image' => 'https://picsum.photos/seed/designer16/400/400'
        ]);
        
        $u = User::create(['name' => 'Modern Bhagalpur Designers Account', 'email' => 'designer17@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540017']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Modern Bhagalpur Designers', 'slug' => Str::slug('Modern Bhagalpur Designers-17'),
            'description' => 'We are the leading interior designers in Bhagalpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 18,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Main Road, Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.7, 'review_count' => 14,
            'cover_image' => 'https://picsum.photos/seed/designer17/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Design Associates Account', 'email' => 'designer18@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540018']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Muzaffarpur Design Associates', 'slug' => Str::slug('Muzaffarpur Design Associates-18'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 20,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.8, 'review_count' => 80,
            'cover_image' => 'https://picsum.photos/seed/designer18/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Design Associates Account', 'email' => 'designer19@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540019']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Muzaffarpur Design Associates', 'slug' => Str::slug('Muzaffarpur Design Associates-19'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 18,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.5, 'review_count' => 86,
            'cover_image' => 'https://picsum.photos/seed/designer19/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Royal Designs Account', 'email' => 'designer20@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540020']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Gaya Royal Designs', 'slug' => Str::slug('Gaya Royal Designs-20'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 10,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 85,
            'cover_image' => 'https://picsum.photos/seed/designer20/400/400'
        ]);
        
        $u = User::create(['name' => 'Darbhanga Design Associates Account', 'email' => 'designer21@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540021']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Darbhanga Design Associates', 'slug' => Str::slug('Darbhanga Design Associates-21'),
            'description' => 'We are the leading interior designers in Darbhanga. Specializing in modern residential and commercial designs.',
            'years_experience' => 13,
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'address' => 'Main Road, Darbhanga',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.8, 'review_count' => 89,
            'cover_image' => 'https://picsum.photos/seed/designer21/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Decor Hub Account', 'email' => 'designer22@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540022']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Gaya Decor Hub', 'slug' => Str::slug('Gaya Decor Hub-22'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 7,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.0, 'review_count' => 19,
            'cover_image' => 'https://picsum.photos/seed/designer22/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Elite Interiors Account', 'email' => 'designer23@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540023']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Purnia Elite Interiors', 'slug' => Str::slug('Purnia Elite Interiors-23'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 2,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 144,
            'cover_image' => 'https://picsum.photos/seed/designer23/400/400'
        ]);
        
        $u = User::create(['name' => 'Magadh Purnia Interiors Account', 'email' => 'designer24@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540024']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Magadh Purnia Interiors', 'slug' => Str::slug('Magadh Purnia Interiors-24'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 6,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.6, 'review_count' => 24,
            'cover_image' => 'https://picsum.photos/seed/designer24/400/400'
        ]);
        
        $u = User::create(['name' => 'Modern Patna Designers Account', 'email' => 'designer25@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540025']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Modern Patna Designers', 'slug' => Str::slug('Modern Patna Designers-25'),
            'description' => 'We are the leading interior designers in Patna. Specializing in modern residential and commercial designs.',
            'years_experience' => 4,
            'city' => 'Patna', 'district' => 'Patna', 'address' => 'Main Road, Patna',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 24,
            'cover_image' => 'https://picsum.photos/seed/designer25/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Royal Designs Account', 'email' => 'designer26@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540026']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Gaya Royal Designs', 'slug' => Str::slug('Gaya Royal Designs-26'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 14,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.8, 'review_count' => 35,
            'cover_image' => 'https://picsum.photos/seed/designer26/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Design Associates Account', 'email' => 'designer27@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540027']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Muzaffarpur Design Associates', 'slug' => Str::slug('Muzaffarpur Design Associates-27'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 18,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 122,
            'cover_image' => 'https://picsum.photos/seed/designer27/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Decor Hub Account', 'email' => 'designer28@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540028']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Purnia Decor Hub', 'slug' => Str::slug('Purnia Decor Hub-28'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 3,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.7, 'review_count' => 132,
            'cover_image' => 'https://picsum.photos/seed/designer28/400/400'
        ]);
        
        $u = User::create(['name' => 'Bihar Gaya Works Account', 'email' => 'designer29@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540029']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Bihar Gaya Works', 'slug' => Str::slug('Bihar Gaya Works-29'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 5,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.6, 'review_count' => 106,
            'cover_image' => 'https://picsum.photos/seed/designer29/400/400'
        ]);
        
        $u = User::create(['name' => 'Modern Gaya Designers Account', 'email' => 'designer30@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540030']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Modern Gaya Designers', 'slug' => Str::slug('Modern Gaya Designers-30'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 15,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 3.8, 'review_count' => 148,
            'cover_image' => 'https://picsum.photos/seed/designer30/400/400'
        ]);
        
        $u = User::create(['name' => 'Modern Darbhanga Designers Account', 'email' => 'designer31@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540031']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Modern Darbhanga Designers', 'slug' => Str::slug('Modern Darbhanga Designers-31'),
            'description' => 'We are the leading interior designers in Darbhanga. Specializing in modern residential and commercial designs.',
            'years_experience' => 6,
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'address' => 'Main Road, Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 68,
            'cover_image' => 'https://picsum.photos/seed/designer31/400/400'
        ]);
        
        $u = User::create(['name' => 'Magadh Bhagalpur Interiors Account', 'email' => 'designer32@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540032']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Magadh Bhagalpur Interiors', 'slug' => Str::slug('Magadh Bhagalpur Interiors-32'),
            'description' => 'We are the leading interior designers in Bhagalpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 8,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Main Road, Bhagalpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.6, 'review_count' => 50,
            'cover_image' => 'https://picsum.photos/seed/designer32/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Patna Solutions Account', 'email' => 'designer33@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540033']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Patna Solutions', 'slug' => Str::slug('Patliputra Patna Solutions-33'),
            'description' => 'We are the leading interior designers in Patna. Specializing in modern residential and commercial designs.',
            'years_experience' => 15,
            'city' => 'Patna', 'district' => 'Patna', 'address' => 'Main Road, Patna',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.3, 'review_count' => 11,
            'cover_image' => 'https://picsum.photos/seed/designer33/400/400'
        ]);
        
        $u = User::create(['name' => 'Bhagalpur Royal Designs Account', 'email' => 'designer34@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540034']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Bhagalpur Royal Designs', 'slug' => Str::slug('Bhagalpur Royal Designs-34'),
            'description' => 'We are the leading interior designers in Bhagalpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 14,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Main Road, Bhagalpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 3.9, 'review_count' => 133,
            'cover_image' => 'https://picsum.photos/seed/designer34/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Interior Studio Account', 'email' => 'designer35@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540035']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Muzaffarpur Interior Studio', 'slug' => Str::slug('Muzaffarpur Interior Studio-35'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 12,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.5, 'review_count' => 17,
            'cover_image' => 'https://picsum.photos/seed/designer35/400/400'
        ]);
        
        $u = User::create(['name' => 'Patna Decor Hub Account', 'email' => 'designer36@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540036']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patna Decor Hub', 'slug' => Str::slug('Patna Decor Hub-36'),
            'description' => 'We are the leading interior designers in Patna. Specializing in modern residential and commercial designs.',
            'years_experience' => 2,
            'city' => 'Patna', 'district' => 'Patna', 'address' => 'Main Road, Patna',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.5, 'review_count' => 103,
            'cover_image' => 'https://picsum.photos/seed/designer36/400/400'
        ]);
        
        $u = User::create(['name' => 'Darbhanga Design Associates Account', 'email' => 'designer37@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540037']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Darbhanga Design Associates', 'slug' => Str::slug('Darbhanga Design Associates-37'),
            'description' => 'We are the leading interior designers in Darbhanga. Specializing in modern residential and commercial designs.',
            'years_experience' => 3,
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'address' => 'Main Road, Darbhanga',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.0, 'review_count' => 110,
            'cover_image' => 'https://picsum.photos/seed/designer37/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Bhagalpur Solutions Account', 'email' => 'designer38@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540038']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Bhagalpur Solutions', 'slug' => Str::slug('Patliputra Bhagalpur Solutions-38'),
            'description' => 'We are the leading interior designers in Bhagalpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 13,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Main Road, Bhagalpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.1, 'review_count' => 92,
            'cover_image' => 'https://picsum.photos/seed/designer38/400/400'
        ]);
        
        $u = User::create(['name' => 'Bhagalpur Elite Interiors Account', 'email' => 'designer39@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540039']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Bhagalpur Elite Interiors', 'slug' => Str::slug('Bhagalpur Elite Interiors-39'),
            'description' => 'We are the leading interior designers in Bhagalpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 17,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Main Road, Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 120,
            'cover_image' => 'https://picsum.photos/seed/designer39/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Royal Designs Account', 'email' => 'designer40@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540040']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Muzaffarpur Royal Designs', 'slug' => Str::slug('Muzaffarpur Royal Designs-40'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 18,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 56,
            'cover_image' => 'https://picsum.photos/seed/designer40/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Muzaffarpur Solutions Account', 'email' => 'designer41@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540041']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Muzaffarpur Solutions', 'slug' => Str::slug('Patliputra Muzaffarpur Solutions-41'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 15,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.5, 'review_count' => 127,
            'cover_image' => 'https://picsum.photos/seed/designer41/400/400'
        ]);
        
        $u = User::create(['name' => 'Patliputra Muzaffarpur Solutions Account', 'email' => 'designer42@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540042']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Patliputra Muzaffarpur Solutions', 'slug' => Str::slug('Patliputra Muzaffarpur Solutions-42'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 18,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 3.9, 'review_count' => 90,
            'cover_image' => 'https://picsum.photos/seed/designer42/400/400'
        ]);
        
        $u = User::create(['name' => 'Bhagalpur Space Planners Account', 'email' => 'designer43@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540043']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Bhagalpur Space Planners', 'slug' => Str::slug('Bhagalpur Space Planners-43'),
            'description' => 'We are the leading interior designers in Bhagalpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 8,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Main Road, Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.2, 'review_count' => 84,
            'cover_image' => 'https://picsum.photos/seed/designer43/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Space Planners Account', 'email' => 'designer44@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540044']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Purnia Space Planners', 'slug' => Str::slug('Purnia Space Planners-44'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 12,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.2, 'review_count' => 91,
            'cover_image' => 'https://picsum.photos/seed/designer44/400/400'
        ]);
        
        $u = User::create(['name' => 'Modern Purnia Designers Account', 'email' => 'designer45@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540045']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Modern Purnia Designers', 'slug' => Str::slug('Modern Purnia Designers-45'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 10,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.5, 'review_count' => 40,
            'cover_image' => 'https://picsum.photos/seed/designer45/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Design Associates Account', 'email' => 'designer46@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540046']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Purnia Design Associates', 'slug' => Str::slug('Purnia Design Associates-46'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 9,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.4, 'review_count' => 97,
            'cover_image' => 'https://picsum.photos/seed/designer46/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Decor Hub Account', 'email' => 'designer47@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540047']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Muzaffarpur Decor Hub', 'slug' => Str::slug('Muzaffarpur Decor Hub-47'),
            'description' => 'We are the leading interior designers in Muzaffarpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 8,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Main Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 126,
            'cover_image' => 'https://picsum.photos/seed/designer47/400/400'
        ]);
        
        $u = User::create(['name' => 'Modern Bhagalpur Designers Account', 'email' => 'designer48@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540048']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Modern Bhagalpur Designers', 'slug' => Str::slug('Modern Bhagalpur Designers-48'),
            'description' => 'We are the leading interior designers in Bhagalpur. Specializing in modern residential and commercial designs.',
            'years_experience' => 9,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Main Road, Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.7, 'review_count' => 66,
            'cover_image' => 'https://picsum.photos/seed/designer48/400/400'
        ]);
        
        $u = User::create(['name' => 'Modern Gaya Designers Account', 'email' => 'designer49@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540049']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Modern Gaya Designers', 'slug' => Str::slug('Modern Gaya Designers-49'),
            'description' => 'We are the leading interior designers in Gaya. Specializing in modern residential and commercial designs.',
            'years_experience' => 2,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Main Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.3, 'review_count' => 128,
            'cover_image' => 'https://picsum.photos/seed/designer49/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Design Associates Account', 'email' => 'designer50@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876540050']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 1, 'title' => 'Purnia Design Associates', 'slug' => Str::slug('Purnia Design Associates-50'),
            'description' => 'We are the leading interior designers in Purnia. Specializing in modern residential and commercial designs.',
            'years_experience' => 8,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Main Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 49,
            'cover_image' => 'https://picsum.photos/seed/designer50/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Structural Planners Account', 'email' => 'arch1@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550001']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Purnia Structural Planners', 'slug' => Str::slug('Purnia Structural Planners-1'),
            'description' => 'Expert architects in Purnia focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 25,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Arch Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.3, 'review_count' => 53,
            'cover_image' => 'https://picsum.photos/seed/arch1/400/400'
        ]);
        
        $u = User::create(['name' => 'Patna Architects Account', 'email' => 'arch2@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550002']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Patna Architects', 'slug' => Str::slug('Patna Architects-2'),
            'description' => 'Expert architects in Patna focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 18,
            'city' => 'Patna', 'district' => 'Patna', 'address' => 'Arch Road, Patna',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.8, 'review_count' => 186,
            'cover_image' => 'https://picsum.photos/seed/arch2/400/400'
        ]);
        
        $u = User::create(['name' => 'Mithila Architecture Account', 'email' => 'arch3@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550003']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Mithila Architecture', 'slug' => Str::slug('Mithila Architecture-3'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 17,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.1, 'review_count' => 151,
            'cover_image' => 'https://picsum.photos/seed/arch3/400/400'
        ]);
        
        $u = User::create(['name' => 'Mithila Architecture Account', 'email' => 'arch4@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550004']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Mithila Architecture', 'slug' => Str::slug('Mithila Architecture-4'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 22,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.2, 'review_count' => 132,
            'cover_image' => 'https://picsum.photos/seed/arch4/400/400'
        ]);
        
        $u = User::create(['name' => 'Bhagalpur Architects Account', 'email' => 'arch5@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550005']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Bhagalpur Architects', 'slug' => Str::slug('Bhagalpur Architects-5'),
            'description' => 'Expert architects in Bhagalpur focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 16,
            'city' => 'Bhagalpur', 'district' => 'Bhagalpur', 'address' => 'Arch Road, Bhagalpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.3, 'review_count' => 161,
            'cover_image' => 'https://picsum.photos/seed/arch5/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Blueprint Experts Account', 'email' => 'arch6@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550006']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Gaya Blueprint Experts', 'slug' => Str::slug('Gaya Blueprint Experts-6'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 6,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 101,
            'cover_image' => 'https://picsum.photos/seed/arch6/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Builders & Architects Account', 'email' => 'arch7@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550007']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Purnia Builders & Architects', 'slug' => Str::slug('Purnia Builders & Architects-7'),
            'description' => 'Expert architects in Purnia focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 26,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Arch Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 5.0, 'review_count' => 79,
            'cover_image' => 'https://picsum.photos/seed/arch7/400/400'
        ]);
        
        $u = User::create(['name' => 'Purnia Structural Planners Account', 'email' => 'arch8@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550008']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Purnia Structural Planners', 'slug' => Str::slug('Purnia Structural Planners-8'),
            'description' => 'Expert architects in Purnia focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 8,
            'city' => 'Purnia', 'district' => 'Purnia', 'address' => 'Arch Road, Purnia',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.9, 'review_count' => 101,
            'cover_image' => 'https://picsum.photos/seed/arch8/400/400'
        ]);
        
        $u = User::create(['name' => 'Darbhanga Commercial Planners Account', 'email' => 'arch9@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550009']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Darbhanga Commercial Planners', 'slug' => Str::slug('Darbhanga Commercial Planners-9'),
            'description' => 'Expert architects in Darbhanga focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 5,
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'address' => 'Arch Road, Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 74,
            'cover_image' => 'https://picsum.photos/seed/arch9/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Structural Planners Account', 'email' => 'arch10@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550010']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Muzaffarpur Structural Planners', 'slug' => Str::slug('Muzaffarpur Structural Planners-10'),
            'description' => 'Expert architects in Muzaffarpur focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 17,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Arch Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.4, 'review_count' => 92,
            'cover_image' => 'https://picsum.photos/seed/arch10/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Builders & Architects Account', 'email' => 'arch11@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550011']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Gaya Builders & Architects', 'slug' => Str::slug('Gaya Builders & Architects-11'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 14,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 153,
            'cover_image' => 'https://picsum.photos/seed/arch11/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Architects Account', 'email' => 'arch12@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550012']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Gaya Architects', 'slug' => Str::slug('Gaya Architects-12'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 28,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 101,
            'cover_image' => 'https://picsum.photos/seed/arch12/400/400'
        ]);
        
        $u = User::create(['name' => 'Darbhanga Structural Planners Account', 'email' => 'arch13@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550013']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Darbhanga Structural Planners', 'slug' => Str::slug('Darbhanga Structural Planners-13'),
            'description' => 'Expert architects in Darbhanga focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 25,
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'address' => 'Arch Road, Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 186,
            'cover_image' => 'https://picsum.photos/seed/arch13/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Modern Villas Account', 'email' => 'arch14@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550014']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Muzaffarpur Modern Villas', 'slug' => Str::slug('Muzaffarpur Modern Villas-14'),
            'description' => 'Expert architects in Muzaffarpur focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 27,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Arch Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 5.0, 'review_count' => 29,
            'cover_image' => 'https://picsum.photos/seed/arch14/400/400'
        ]);
        
        $u = User::create(['name' => 'Mithila Architecture Account', 'email' => 'arch15@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550015']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Mithila Architecture', 'slug' => Str::slug('Mithila Architecture-15'),
            'description' => 'Expert architects in Muzaffarpur focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 12,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Arch Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 82,
            'cover_image' => 'https://picsum.photos/seed/arch15/400/400'
        ]);
        
        $u = User::create(['name' => 'Mithila Architecture Account', 'email' => 'arch16@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550016']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Mithila Architecture', 'slug' => Str::slug('Mithila Architecture-16'),
            'description' => 'Expert architects in Darbhanga focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 26,
            'city' => 'Darbhanga', 'district' => 'Darbhanga', 'address' => 'Arch Road, Darbhanga',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.1, 'review_count' => 118,
            'cover_image' => 'https://picsum.photos/seed/arch16/400/400'
        ]);
        
        $u = User::create(['name' => 'Muzaffarpur Builders & Architects Account', 'email' => 'arch17@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550017']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Muzaffarpur Builders & Architects', 'slug' => Str::slug('Muzaffarpur Builders & Architects-17'),
            'description' => 'Expert architects in Muzaffarpur focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 16,
            'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'address' => 'Arch Road, Muzaffarpur',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.4, 'review_count' => 155,
            'cover_image' => 'https://picsum.photos/seed/arch17/400/400'
        ]);
        
        $u = User::create(['name' => 'Mithila Architecture Account', 'email' => 'arch18@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550018']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Mithila Architecture', 'slug' => Str::slug('Mithila Architecture-18'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 16,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 80,
            'cover_image' => 'https://picsum.photos/seed/arch18/400/400'
        ]);
        
        $u = User::create(['name' => 'Patna Blueprint Experts Account', 'email' => 'arch19@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550019']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Patna Blueprint Experts', 'slug' => Str::slug('Patna Blueprint Experts-19'),
            'description' => 'Expert architects in Patna focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 27,
            'city' => 'Patna', 'district' => 'Patna', 'address' => 'Arch Road, Patna',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.0, 'review_count' => 99,
            'cover_image' => 'https://picsum.photos/seed/arch19/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Blueprint Experts Account', 'email' => 'arch20@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550020']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Gaya Blueprint Experts', 'slug' => Str::slug('Gaya Blueprint Experts-20'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 18,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.4, 'review_count' => 162,
            'cover_image' => 'https://picsum.photos/seed/arch20/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Commercial Planners Account', 'email' => 'arch21@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550021']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Gaya Commercial Planners', 'slug' => Str::slug('Gaya Commercial Planners-21'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 27,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => false,
            'avg_rating' => 4.6, 'review_count' => 95,
            'cover_image' => 'https://picsum.photos/seed/arch21/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Structural Planners Account', 'email' => 'arch22@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550022']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Gaya Structural Planners', 'slug' => Str::slug('Gaya Structural Planners-22'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 27,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.8, 'review_count' => 85,
            'cover_image' => 'https://picsum.photos/seed/arch22/400/400'
        ]);
        
        $u = User::create(['name' => 'Gaya Architects Account', 'email' => 'arch23@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550023']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Gaya Architects', 'slug' => Str::slug('Gaya Architects-23'),
            'description' => 'Expert architects in Gaya focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 14,
            'city' => 'Gaya', 'district' => 'Gaya', 'address' => 'Arch Road, Gaya',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.8, 'review_count' => 15,
            'cover_image' => 'https://picsum.photos/seed/arch23/400/400'
        ]);
        
        $u = User::create(['name' => 'Patna Blueprint Experts Account', 'email' => 'arch24@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550024']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Patna Blueprint Experts', 'slug' => Str::slug('Patna Blueprint Experts-24'),
            'description' => 'Expert architects in Patna focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 5,
            'city' => 'Patna', 'district' => 'Patna', 'address' => 'Arch Road, Patna',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.5, 'review_count' => 96,
            'cover_image' => 'https://picsum.photos/seed/arch24/400/400'
        ]);
        
        $u = User::create(['name' => 'Patna Structural Planners Account', 'email' => 'arch25@example.com', 'password' => Hash::make('password'), 'verification_level' => 'business_verified', 'is_active' => true, 'phone' => '9876550025']);
        DB::table('user_roles')->insert(['user_id' => $u->id, 'role_id' => $bizRoleId]);
        DB::table('wallets')->insert(['user_id' => $u->id, 'balance' => 5000]);
        Listing::create([
            'user_id' => $u->id, 'category_id' => 2, 'title' => 'Patna Structural Planners', 'slug' => Str::slug('Patna Structural Planners-25'),
            'description' => 'Expert architects in Patna focusing on Luxury Villas and Modern Residential complexes.',
            'years_experience' => 5,
            'city' => 'Patna', 'district' => 'Patna', 'address' => 'Arch Road, Patna',
            'status' => 'active', 'is_featured' => true,
            'avg_rating' => 4.2, 'review_count' => 27,
            'cover_image' => 'https://picsum.photos/seed/arch25/400/400'
        ]);
          }
}
