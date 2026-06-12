<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WorkerSeeder extends Seeder
{
    private array $workers = [
        // Painters (12)
        ['name' => 'Ramesh Kumar Chauhan',   'skill' => 'Painter',      'city' => 'Patna',       'district' => 'Patna',       'exp' => 8,  'rate' => 700],
        ['name' => 'Suresh Prasad',          'skill' => 'Painter',      'city' => 'Patna',       'district' => 'Patna',       'exp' => 5,  'rate' => 600],
        ['name' => 'Mohan Lal Bind',         'skill' => 'Painter',      'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 10, 'rate' => 750],
        ['name' => 'Dinesh Yadav',           'skill' => 'Painter',      'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 6,  'rate' => 650],
        ['name' => 'Vijay Rajak',            'skill' => 'Painter',      'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 4,  'rate' => 580],
        ['name' => 'Arvind Kumar Singh',     'skill' => 'Painter',      'city' => 'Darbhanga',   'district' => 'Darbhanga',   'exp' => 7,  'rate' => 680],
        ['name' => 'Ganesh Paswan',          'skill' => 'Painter',      'city' => 'Hajipur',     'district' => 'Vaishali',    'exp' => 3,  'rate' => 550],
        ['name' => 'Santosh Kumar Bind',     'skill' => 'Painter',      'city' => 'Chapra',      'district' => 'Saran',       'exp' => 9,  'rate' => 720],
        ['name' => 'Rakesh Sharma',          'skill' => 'Painter',      'city' => 'Arrah',       'district' => 'Bhojpur',     'exp' => 5,  'rate' => 620],
        ['name' => 'Umesh Chamar',           'skill' => 'Painter',      'city' => 'Sasaram',     'district' => 'Rohtas',      'exp' => 12, 'rate' => 800],
        ['name' => 'Naresh Patel',           'skill' => 'Painter',      'city' => 'Begusarai',   'district' => 'Begusarai',   'exp' => 6,  'rate' => 640],
        ['name' => 'Manoj Kumar Kaushal',    'skill' => 'Painter',      'city' => 'Munger',      'district' => 'Munger',      'exp' => 8,  'rate' => 700],

        // Plumbers (9)
        ['name' => 'Anil Kumar Mistri',      'skill' => 'Plumber',      'city' => 'Patna',       'district' => 'Patna',       'exp' => 10, 'rate' => 800],
        ['name' => 'Rajan Vishwakarma',      'skill' => 'Plumber',      'city' => 'Patna',       'district' => 'Patna',       'exp' => 7,  'rate' => 750],
        ['name' => 'Deepak Kachhap',         'skill' => 'Plumber',      'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 5,  'rate' => 680],
        ['name' => 'Brijesh Kumar',          'skill' => 'Plumber',      'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 8,  'rate' => 750],
        ['name' => 'Sanjay Mallah',          'skill' => 'Plumber',      'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 6,  'rate' => 700],
        ['name' => 'Mukesh Rajan',           'skill' => 'Plumber',      'city' => 'Bihar Sharif','district' => 'Nalanda',     'exp' => 4,  'rate' => 620],
        ['name' => 'Ashok Nishad',           'skill' => 'Plumber',      'city' => 'Hajipur',     'district' => 'Vaishali',    'exp' => 9,  'rate' => 780],
        ['name' => 'Pawan Kumar Bind',       'skill' => 'Plumber',      'city' => 'Darbhanga',   'district' => 'Darbhanga',   'exp' => 11, 'rate' => 850],
        ['name' => 'Chandan Kumar Sah',      'skill' => 'Plumber',      'city' => 'Samastipur',  'district' => 'Samastipur',  'exp' => 5,  'rate' => 660],

        // Electricians (9)
        ['name' => 'Vivek Jha',              'skill' => 'Electrician',  'city' => 'Patna',       'district' => 'Patna',       'exp' => 12, 'rate' => 900],
        ['name' => 'Santosh Gupta',          'skill' => 'Electrician',  'city' => 'Patna',       'district' => 'Patna',       'exp' => 8,  'rate' => 800],
        ['name' => 'Ranjeet Kumar',          'skill' => 'Electrician',  'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 6,  'rate' => 750],
        ['name' => 'Deependra Srivastava',   'skill' => 'Electrician',  'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 10, 'rate' => 850],
        ['name' => 'Kamlesh Kumar',          'skill' => 'Electrician',  'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 7,  'rate' => 770],
        ['name' => 'Amarjeet Singh',         'skill' => 'Electrician',  'city' => 'Purnia',      'district' => 'Purnia',      'exp' => 5,  'rate' => 700],
        ['name' => 'Pradeep Verma',          'skill' => 'Electrician',  'city' => 'Chapra',      'district' => 'Saran',       'exp' => 9,  'rate' => 820],
        ['name' => 'Sunil Kumar Thakur',     'skill' => 'Electrician',  'city' => 'Siwan',       'district' => 'Siwan',       'exp' => 4,  'rate' => 660],
        ['name' => 'Rajesh Prasad Sah',      'skill' => 'Electrician',  'city' => 'Katihar',     'district' => 'Katihar',     'exp' => 6,  'rate' => 720],

        // Carpenters (8)
        ['name' => 'Shyam Sundar Badhai',    'skill' => 'Carpenter',    'city' => 'Patna',       'district' => 'Patna',       'exp' => 15, 'rate' => 950],
        ['name' => 'Hari Om Mistri',         'skill' => 'Carpenter',    'city' => 'Patna',       'district' => 'Patna',       'exp' => 10, 'rate' => 850],
        ['name' => 'Biswanath Sarkar',       'skill' => 'Carpenter',    'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 8,  'rate' => 800],
        ['name' => 'Ramdev Chauhan',         'skill' => 'Carpenter',    'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 12, 'rate' => 900],
        ['name' => 'Sitaram Badhai',         'skill' => 'Carpenter',    'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 7,  'rate' => 780],
        ['name' => 'Laxman Prasad Vishwakarma','skill' => 'Carpenter',  'city' => 'Arrah',       'district' => 'Bhojpur',     'exp' => 9,  'rate' => 830],
        ['name' => 'Birendra Kumar Badhai',  'skill' => 'Carpenter',    'city' => 'Bihar Sharif','district' => 'Nalanda',     'exp' => 6,  'rate' => 750],
        ['name' => 'Suresh Vishwakarma',     'skill' => 'Carpenter',    'city' => 'Darbhanga',   'district' => 'Darbhanga',   'exp' => 11, 'rate' => 880],

        // Masons (7)
        ['name' => 'Bachcha Raj Mistri',     'skill' => 'Mason',        'city' => 'Patna',       'district' => 'Patna',       'exp' => 18, 'rate' => 1000],
        ['name' => 'Chandradev Thakur',      'skill' => 'Mason',        'city' => 'Patna',       'district' => 'Patna',       'exp' => 12, 'rate' => 900],
        ['name' => 'Prabhu Dayal Raj',       'skill' => 'Mason',        'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 15, 'rate' => 950],
        ['name' => 'Hirendra Kumar Mistri',  'skill' => 'Mason',        'city' => 'Gaya',        'district' => 'Gaya',        'exp' => 10, 'rate' => 870],
        ['name' => 'Ram Naresh Raj',         'skill' => 'Mason',        'city' => 'Sasaram',     'district' => 'Rohtas',      'exp' => 14, 'rate' => 930],
        ['name' => 'Binod Kumar Raj',        'skill' => 'Mason',        'city' => 'Chapra',      'district' => 'Saran',       'exp' => 8,  'rate' => 820],
        ['name' => 'Omprakash Mandal',       'skill' => 'Mason',        'city' => 'Samastipur',  'district' => 'Samastipur',  'exp' => 11, 'rate' => 880],

        // Welders (5)
        ['name' => 'Ganesh Lohar',           'skill' => 'Welder',       'city' => 'Patna',       'district' => 'Patna',       'exp' => 9,  'rate' => 800],
        ['name' => 'Shankar Kumar Lohar',    'skill' => 'Welder',       'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'exp' => 7,  'rate' => 750],
        ['name' => 'Rajkishore Sharma',      'skill' => 'Welder',       'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'exp' => 5,  'rate' => 700],
        ['name' => 'Dilip Kumar Lohar',      'skill' => 'Welder',       'city' => 'Arrah',       'district' => 'Bhojpur',     'exp' => 11, 'rate' => 850],
        ['name' => 'Jitendra Kumar',         'skill' => 'Welder',       'city' => 'Begusarai',   'district' => 'Begusarai',   'exp' => 6,  'rate' => 720],
    ];

    private array $skillBios = [
        'Painter'     => 'Expert in interior and exterior wall painting. Specializes in texture painting, waterproofing coats, and decorative finishes. Works with all major paint brands.',
        'Plumber'     => 'Experienced in residential and commercial plumbing. Skilled in pipe fitting, water tank installation, bathroom fittings, and leak repairs.',
        'Electrician' => 'Licensed electrician with expertise in home wiring, MCB panel installation, AC/fan fitting, and electrical troubleshooting.',
        'Carpenter'   => 'Skilled carpenter specializing in modular furniture, door/window fitting, false ceiling framing, and custom woodwork.',
        'Mason'       => 'Expert brick and stone mason. Experienced in RCC construction, tiling, plaster work, and structural repairs.',
        'Welder'      => 'Skilled welder proficient in MIG, TIG, and arc welding. Specializes in grills, gates, railings, and structural steel work.',
    ];

    public function run(): void
    {
        foreach ($this->workers as $index => $data) {
            $user = User::firstOrCreate(
                ['email' => 'worker' . ($index + 1) . '@example.com'],
                [
                    'name'              => $data['name'],
                    'phone'             => '9' . str_pad(rand(100000000, 999999999), 9, '0', STR_PAD_LEFT),
                    'password'          => Hash::make('Worker@123'),
                    'role'              => 'worker',
                    'is_active'         => true,
                    'email_verified_at' => now(),
                ]
            );

            $slug = Str::slug($data['name']) . '-' . Str::random(4);
            Worker::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'name'             => $data['name'],
                    'slug'             => $slug,
                    'phone'            => $user->phone,
                    'city'             => $data['city'],
                    'district'         => $data['district'],
                    'skill'            => $data['skill'],
                    'skills_tags'      => [$data['skill'], 'Home Renovation', 'Bihar'],
                    'experience_years' => $data['exp'],
                    'daily_rate'       => $data['rate'],
                    'is_available'     => rand(0, 4) > 0, // 80% available
                    'is_verified'      => rand(0, 1) === 1,
                    'is_featured'      => $index < 8,     // First 8 featured
                    'avg_rating'       => round(rand(38, 50) / 10, 1),
                    'review_count'     => rand(2, 20),
                    'bio'              => $this->skillBios[$data['skill']] ?? '',
                    'status'           => 'active',
                ]
            );
        }
    }
}
