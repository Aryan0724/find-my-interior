<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ListingSeeder extends Seeder
{
    private array $listings = [
        // Interior Designers (10)
        ['title' => 'Abhishek Interior Studio',       'cat' => 'Interior Designers', 'city' => 'Patna',       'district' => 'Patna',       'exp' => 8,  'tag' => 'Modern & Contemporary Interiors'],
        ['title' => 'Swati Decor & Interiors',        'cat' => 'Interior Designers', 'city' => 'Patna',       'district' => 'Patna',       'exp' => 6,  'tag' => 'Luxury Home Interiors Specialist'],
        ['title' => 'Archi Design Studio',            'cat' => 'Interior Designers', 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 10, 'tag' => 'Award-Winning Interior Designers'],
        ['title' => 'Priya Interior Works',           'cat' => 'Interior Designers', 'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 5,  'tag' => 'Budget-Friendly Interiors'],
        ['title' => 'Kumar Spaces',                   'cat' => 'Interior Designers', 'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 7,  'tag' => 'Vastu-Compliant Interior Design'],
        ['title' => 'Mithila Interiors',              'cat' => 'Interior Designers', 'city' => 'Darbhanga',   'district' => 'Darbhanga',   'exp' => 9,  'tag' => 'Traditional & Modern Fusion'],
        ['title' => 'Urban Home Solutions',           'cat' => 'Interior Designers', 'city' => 'Hajipur',     'district' => 'Vaishali',    'exp' => 4,  'tag' => 'Modular Interior Solutions'],
        ['title' => 'Classic Interior Design Studio', 'cat' => 'Interior Designers', 'city' => 'Bihar Sharif','district' => 'Nalanda',     'exp' => 11, 'tag' => 'Premium Interior Designers'],
        ['title' => 'Raj Interior & Furniture',       'cat' => 'Interior Designers', 'city' => 'Chapra',      'district' => 'Saran',       'exp' => 6,  'tag' => 'Complete Home Interior Solutions'],
        ['title' => 'Elite Home Decor',               'cat' => 'Interior Designers', 'city' => 'Purnia',      'district' => 'Purnia',      'exp' => 8,  'tag' => 'Modern Home Transformation'],

        // Architects (8)
        ['title' => 'Arch Vision Associates',         'cat' => 'Architects',        'city' => 'Patna',       'district' => 'Patna',       'exp' => 15, 'tag' => 'Licensed Architects, Bihar'],
        ['title' => 'DesignBuild Architects',         'cat' => 'Architects',        'city' => 'Patna',       'district' => 'Patna',       'exp' => 10, 'tag' => 'Residential & Commercial Architecture'],
        ['title' => 'Bihar Architecture Studio',      'cat' => 'Architects',        'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 8,  'tag' => 'Sustainable Architecture Specialist'],
        ['title' => 'Manas Architects',               'cat' => 'Architects',        'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 12, 'tag' => 'Complete Architectural Services'],
        ['title' => 'Creative Blueprint Studio',      'cat' => 'Architects',        'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 7,  'tag' => 'Innovative Architectural Design'],
        ['title' => 'Structure & Form Architects',    'cat' => 'Architects',        'city' => 'Samastipur',  'district' => 'Samastipur',  'exp' => 9,  'tag' => 'Vastu Architecture Experts'],
        ['title' => 'Modern Form Architects',         'cat' => 'Architects',        'city' => 'Arrah',       'district' => 'Bhojpur',     'exp' => 6,  'tag' => 'Green Building Certified'],
        ['title' => 'Sitamarhi Design Associates',    'cat' => 'Architects',        'city' => 'Sitamarhi',   'district' => 'Sitamarhi',   'exp' => 5,  'tag' => 'Affordable Architecture'],

        // Civil Contractors (8)
        ['title' => 'Patna Civil Works',              'cat' => 'Civil Contractors', 'city' => 'Patna',       'district' => 'Patna',       'exp' => 12, 'tag' => 'RCC & Structural Construction'],
        ['title' => 'Sinha Construction Company',     'cat' => 'Civil Contractors', 'city' => 'Patna',       'district' => 'Patna',       'exp' => 20, 'tag' => '25+ Years of Construction Excellence'],
        ['title' => 'Nalanda Construction Group',     'cat' => 'Civil Contractors', 'city' => 'Bihar Sharif','district' => 'Nalanda',     'exp' => 8,  'tag' => 'Residential Construction Specialist'],
        ['title' => 'Mithila Contractors',            'cat' => 'Civil Contractors', 'city' => 'Darbhanga',   'district' => 'Darbhanga',   'exp' => 10, 'tag' => 'Commercial & Industrial Construction'],
        ['title' => 'Ganga Civil Constructions',      'cat' => 'Civil Contractors', 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 14, 'tag' => 'Trusted Civil Contractor'],
        ['title' => 'Bhojpur Builders & Contractors', 'cat' => 'Civil Contractors', 'city' => 'Arrah',       'district' => 'Bhojpur',     'exp' => 7,  'tag' => 'Quality Construction at Affordable Rates'],
        ['title' => 'Bihar Works Corporation',        'cat' => 'Civil Contractors', 'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 16, 'tag' => 'Large-Scale Civil Contractor'],
        ['title' => 'Champaran Contractor Services',  'cat' => 'Civil Contractors', 'city' => 'Motihari',    'district' => 'East Champaran','exp' => 9, 'tag' => 'Government & Private Projects'],

        // Modular Kitchen Experts (6)
        ['title' => 'Patna Modular Kitchen Studio',   'cat' => 'Modular Kitchen Experts', 'city' => 'Patna',       'district' => 'Patna',       'exp' => 8,  'tag' => 'Premium Modular Kitchens'],
        ['title' => 'Dream Kitchen Designers',        'cat' => 'Modular Kitchen Experts', 'city' => 'Patna',       'district' => 'Patna',       'exp' => 5,  'tag' => 'Italian-Style Modular Kitchen'],
        ['title' => 'Muzaffarpur Kitchen Works',      'cat' => 'Modular Kitchen Experts', 'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 6,  'tag' => 'Budget Modular Kitchens'],
        ['title' => 'Smart Kitchen Solutions',        'cat' => 'Modular Kitchen Experts', 'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 4,  'tag' => 'Customized Kitchen Design'],
        ['title' => 'Bhagalpur Modular Furniture',    'cat' => 'Modular Kitchen Experts', 'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 7,  'tag' => 'Complete Kitchen Makeover'],
        ['title' => 'Bihar Kitchen World',            'cat' => 'Modular Kitchen Experts', 'city' => 'Chapra',      'district' => 'Saran',       'exp' => 5,  'tag' => 'Modern Kitchen Installation'],

        // Painters (6)
        ['title' => 'Patna Painting Works',           'cat' => 'Painters',          'city' => 'Patna',       'district' => 'Patna',       'exp' => 10, 'tag' => 'Professional Painting Contractors'],
        ['title' => 'Colour Masters Patna',           'cat' => 'Painters',          'city' => 'Patna',       'district' => 'Patna',       'exp' => 7,  'tag' => 'Texture & Decorative Painting'],
        ['title' => 'Bihar Paint Solutions',          'cat' => 'Painters',          'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 8,  'tag' => 'Interior & Exterior Painting'],
        ['title' => 'Gaya Painting Services',         'cat' => 'Painters',          'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 5,  'tag' => 'Affordable Home Painting'],
        ['title' => 'Bhagalpur Paint Works',          'cat' => 'Painters',          'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 6,  'tag' => 'Quality Painting at Best Rates'],
        ['title' => 'All Season Painters',            'cat' => 'Painters',          'city' => 'Hajipur',     'district' => 'Vaishali',    'exp' => 9,  'tag' => 'Commercial & Residential Painting'],

        // Electricians (6)
        ['title' => 'Patna Electrical Works',         'cat' => 'Electricians',      'city' => 'Patna',       'district' => 'Patna',       'exp' => 12, 'tag' => 'Licensed Electrical Contractors'],
        ['title' => 'Power Connect Solutions',        'cat' => 'Electricians',      'city' => 'Patna',       'district' => 'Patna',       'exp' => 8,  'tag' => 'Complete Home Wiring Solutions'],
        ['title' => 'Muzaffarpur Electric House',     'cat' => 'Electricians',      'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 7,  'tag' => 'Residential Electrical Services'],
        ['title' => 'Bihar Electric Services',        'cat' => 'Electricians',      'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 6,  'tag' => 'Solar & Electrical Installation'],
        ['title' => 'Bhagalpur Electrical Contractors','cat'=> 'Electricians',      'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 9,  'tag' => 'Industrial & Commercial Wiring'],
        ['title' => 'Smart Power Solutions',          'cat' => 'Electricians',      'city' => 'Bihar Sharif','district' => 'Nalanda',     'exp' => 5,  'tag' => 'Home Automation & Wiring'],

        // Plumbers (6)
        ['title' => 'Patna Plumbing Services',        'cat' => 'Plumbers',          'city' => 'Patna',       'district' => 'Patna',       'exp' => 11, 'tag' => 'Complete Plumbing Solutions'],
        ['title' => 'AquaFix Plumbing',               'cat' => 'Plumbers',          'city' => 'Patna',       'district' => 'Patna',       'exp' => 7,  'tag' => 'Residential & Commercial Plumbing'],
        ['title' => 'Bihar Pipe & Fitting Works',     'cat' => 'Plumbers',          'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 9,  'tag' => 'Expert Pipe Fitting Services'],
        ['title' => 'Gaya Plumbing Contractors',      'cat' => 'Plumbers',          'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 6,  'tag' => 'Affordable Plumbing Repairs'],
        ['title' => 'Vaishali Water Works',           'cat' => 'Plumbers',          'city' => 'Hajipur',     'district' => 'Vaishali',    'exp' => 8,  'tag' => 'Water Tank & Bore Well Solutions'],
        ['title' => 'Quick Fix Plumbing Services',    'cat' => 'Plumbers',          'city' => 'Chapra',      'district' => 'Saran',       'exp' => 5,  'tag' => 'Emergency Plumbing Services'],
    ];

    public function run(): void
    {
        foreach ($this->listings as $index => $data) {
            $category = Category::where('name', $data['cat'])->first();

            if (!$category) {
                continue;
            }

            $user = User::firstOrCreate(
                ['email' => 'professional' . ($index + 1) . '@example.com'],
                [
                    'name'              => $data['title'],
                    'phone'             => '9' . str_pad(rand(100000000, 999999999), 9, '0', STR_PAD_LEFT),
                    'password'          => Hash::make('Business@123'),
                    'role'              => 'business',
                    'is_active'         => true,
                    'email_verified_at' => now(),
                ]
            );

            $slug = Str::slug($data['title']) . '-' . Str::random(4);

            Listing::firstOrCreate(
                ['slug' => $slug],
                [
                    'user_id'          => $user->id,
                    'category_id'      => $category->id,
                    'title'            => $data['title'],
                    'slug'             => $slug,
                    'tagline'          => $data['tag'],
                    'description'      => $data['title'] . ' is one of Bihar\'s trusted ' . strtolower($data['cat']) . ' based in ' . $data['city'] . '. With ' . $data['exp'] . ' years of experience, we deliver quality work at competitive prices. Contact us for a free consultation.',
                    'phone'            => $user->phone,
                    'whatsapp'         => $user->phone,
                    'email'            => $user->email,
                    'city'             => $data['city'],
                    'district'         => $data['district'],
                    'state'            => 'Bihar',
                    'years_experience' => $data['exp'],
                    'avg_rating'       => round(rand(38, 50) / 10, 1),
                    'review_count'     => rand(3, 45),
                    'is_verified'      => rand(0, 1) === 1,
                    'is_featured'      => $index < 8,    // First 8 are featured
                    'is_premium'       => $index < 3,    // First 3 are premium
                    'status'           => 'active',
                    'views_count'      => rand(50, 500),
                ]
            );
        }
    }
}
