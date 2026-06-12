<?php

namespace Database\Seeders;

use App\Models\Builder;
use App\Models\BuilderProject;
use App\Models\BuilderProjectImage;
use App\Models\District;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BuilderSeeder extends Seeder
{
    private array $builderData = [
        ['company' => 'Patna Buildcon Pvt Ltd',       'city' => 'Patna',       'district' => 'Patna',       'rera' => 'BR/2019/0012', 'year' => 2010],
        ['company' => 'Bihar Infra Projects',          'city' => 'Patna',       'district' => 'Patna',       'rera' => 'BR/2020/0045', 'year' => 2015],
        ['company' => 'Ganga Realtors',                'city' => 'Patna',       'district' => 'Patna',       'rera' => 'BR/2018/0031', 'year' => 2008],
        ['company' => 'Sonepur Heights Developers',   'city' => 'Hajipur',     'district' => 'Vaishali',    'rera' => null,           'year' => 2012],
        ['company' => 'Muzaffarpur Housing Corp',      'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'rera' => 'BR/2021/0078', 'year' => 2016],
        ['company' => 'Mithila Build Estate',          'city' => 'Darbhanga',   'district' => 'Darbhanga',   'rera' => null,           'year' => 2013],
        ['company' => 'Nalanda Smart Homes',           'city' => 'Bihar Sharif','district' => 'Nalanda',     'rera' => 'BR/2022/0091', 'year' => 2018],
        ['company' => 'Bhagalpur Township Ltd',        'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'rera' => 'BR/2019/0067', 'year' => 2011],
        ['company' => 'Chapra City Builders',          'city' => 'Chapra',      'district' => 'Saran',       'rera' => null,           'year' => 2014],
        ['company' => 'Gaya Lotus Constructions',      'city' => 'Gaya',        'district' => 'Gaya',        'rera' => 'BR/2020/0033', 'year' => 2017],
        ['company' => 'Arrah Prime Developers',        'city' => 'Arrah',       'district' => 'Bhojpur',     'rera' => null,           'year' => 2015],
        ['company' => 'Samastipur Urban Projects',     'city' => 'Samastipur',  'district' => 'Samastipur',  'rera' => null,           'year' => 2016],
        ['company' => 'Katihar Metro Builders',        'city' => 'Katihar',     'district' => 'Katihar',     'rera' => 'BR/2021/0102', 'year' => 2019],
        ['company' => 'Purnia Dream Homes',            'city' => 'Purnia',      'district' => 'Purnia',      'rera' => null,           'year' => 2013],
        ['company' => 'Begusarai Steel City Realty',  'city' => 'Begusarai',   'district' => 'Begusarai',   'rera' => 'BR/2020/0088', 'year' => 2014],
        ['company' => 'Munger River View Developers', 'city' => 'Munger',      'district' => 'Munger',      'rera' => null,           'year' => 2011],
        ['company' => 'Sasaram Golden Realtors',       'city' => 'Sasaram',     'district' => 'Rohtas',      'rera' => null,           'year' => 2017],
        ['company' => 'Champaran Green Builders',      'city' => 'Motihari',    'district' => 'East Champaran','rera' => null,          'year' => 2018],
        ['company' => 'Siwan Township Developers',     'city' => 'Siwan',       'district' => 'Siwan',       'rera' => null,           'year' => 2016],
        ['company' => 'Vaishali Heritage Constructions','city' => 'Hajipur',   'district' => 'Vaishali',    'rera' => 'BR/2022/0055', 'year' => 2020],
    ];

    private array $projectTypes = [
        ['name' => 'Sunrise Residency',   'type' => 'residential', 'bhk' => '2BHK, 3BHK',      'status' => 'ongoing',          'possession' => false],
        ['name' => 'Green Valley Villas', 'type' => 'residential', 'bhk' => '3BHK, 4BHK',      'status' => 'possession_ready', 'possession' => true],
        ['name' => 'Metro Plaza',         'type' => 'commercial',  'bhk' => null,               'status' => 'upcoming',         'possession' => false],
        ['name' => 'River View Enclave',  'type' => 'residential', 'bhk' => '2BHK, 3BHK, 4BHK','status' => 'completed',        'possession' => true],
        ['name' => 'City Center Heights', 'type' => 'mixed',       'bhk' => '1BHK, 2BHK',      'status' => 'ongoing',          'possession' => false],
    ];

    public function run(): void
    {
        foreach ($this->builderData as $index => $data) {
            // Create user for builder
            $user = User::firstOrCreate(
                ['email' => 'builder' . ($index + 1) . '@example.com'],
                [
                    'name'              => $data['company'] . ' Account',
                    'phone'             => '9' . str_pad(rand(100000000, 999999999), 9, '0', STR_PAD_LEFT),
                    'password'          => Hash::make('Builder@123'),
                    'role'              => 'builder',
                    'is_active'         => true,
                    'email_verified_at' => now(),
                ]
            );

            // Create builder profile
            $slug = Str::slug($data['company']) . '-' . Str::random(4);
            $builder = Builder::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'company_name'      => $data['company'],
                    'slug'              => $slug,
                    'tagline'           => 'Building dreams, delivering quality across Bihar',
                    'phone'             => $user->phone,
                    'email'             => $user->email,
                    'city'              => $data['city'],
                    'district'          => $data['district'],
                    'rera_number'       => $data['rera'],
                    'established_year'  => $data['year'],
                    'total_projects'    => 5,
                    'delivered_projects' => rand(2, 4),
                    'avg_rating'        => round(rand(38, 50) / 10, 1),
                    'review_count'      => rand(5, 30),
                    'is_verified'       => rand(0, 1) === 1,
                    'is_featured'       => $index < 4, // First 4 are featured
                    'status'            => 'active',
                ]
            );

            // Create 5 projects per builder
            foreach ($this->projectTypes as $pIndex => $project) {
                $pSlug = Str::slug($project['name'] . ' ' . $data['city']) . '-' . Str::random(4);
                $priceBase = rand(20, 80) * 100000;

                BuilderProject::firstOrCreate(
                    ['slug' => $pSlug],
                    [
                        'builder_id'          => $builder->id,
                        'title'               => $project['name'] . ', ' . $data['city'],
                        'slug'                => $pSlug,
                        'description'         => 'A prestigious ' . $project['type'] . ' project by ' . $data['company'] . ' in the heart of ' . $data['city'] . ', Bihar. Featuring modern amenities, quality construction and excellent connectivity.',
                        'project_type'        => $project['type'],
                        'location'            => $data['city'] . ', ' . $data['district'] . ' District',
                        'city'                => $data['city'],
                        'bhk_options'         => $project['bhk'],
                        'area_sqft_min'       => $project['type'] === 'residential' ? rand(800, 1200) : null,
                        'area_sqft_max'       => $project['type'] === 'residential' ? rand(1500, 2500) : null,
                        'price_min'           => $priceBase,
                        'price_max'           => $priceBase + rand(500000, 2000000),
                        'possession_date'     => $project['possession'] ? now()->subMonths(rand(1, 12)) : now()->addMonths(rand(6, 24)),
                        'is_possession_ready' => $project['possession'],
                        'status'              => $project['status'],
                        'is_featured'         => $pIndex === 0 && $index < 4,
                    ]
                );
            }
        }
    }
}
