<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DistrictSeeder extends Seeder
{
    /**
     * All 38 districts of Bihar.
     */
    private array $districts = [
        'Araria', 'Arwal', 'Aurangabad', 'Banka', 'Begusarai',
        'Bhagalpur', 'Bhojpur', 'Buxar', 'Darbhanga', 'East Champaran',
        'Gaya', 'Gopalganj', 'Jamui', 'Jehanabad', 'Kaimur',
        'Katihar', 'Khagaria', 'Kishanganj', 'Lakhisarai', 'Madhepura',
        'Madhubani', 'Munger', 'Muzaffarpur', 'Nalanda', 'Nawada',
        'Patna', 'Purnia', 'Rohtas', 'Saharsa', 'Samastipur',
        'Saran', 'Sheikhpura', 'Sheohar', 'Sitamarhi', 'Siwan',
        'Supaul', 'Vaishali', 'West Champaran',
    ];

    public function run(): void
    {
        foreach ($this->districts as $name) {
            District::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'state' => 'Bihar',
                    'is_active' => true,
                ]
            );
        }
    }
}
