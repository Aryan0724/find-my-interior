<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Major cities keyed by district name.
     */
    private array $cities = [
        'Patna'           => ['Patna City', 'Danapur', 'Phulwari Sharif', 'Fatuha', 'Khusrupur', 'Masaurhi', 'Barh'],
        'Gaya'            => ['Gaya', 'Bodh Gaya', 'Sherghati', 'Nawada City', 'Gurua'],
        'Muzaffarpur'     => ['Muzaffarpur', 'Sitamarhi City', 'Motipur', 'Bochaha'],
        'Bhagalpur'       => ['Bhagalpur', 'Kahalgaon', 'Sultanganj', 'Naugachhia'],
        'Darbhanga'       => ['Darbhanga', 'Biraul', 'Baheri', 'Singhwara'],
        'Nalanda'         => ['Bihar Sharif', 'Rajgir', 'Hilsa', 'Islampur'],
        'Vaishali'        => ['Hajipur', 'Lalganj', 'Mahua', 'Raghopur'],
        'Saran'           => ['Chapra', 'Marhaura', 'Marhowrah'],
        'Siwan'           => ['Siwan', 'Maharajganj', 'Barharia'],
        'Begusarai'       => ['Begusarai', 'Barauni', 'Teghra'],
        'Samastipur'      => ['Samastipur', 'Dalsingsarai', 'Rosera'],
        'Purnia'          => ['Purnia', 'Katihar City', 'Kishanganj City', 'Araria City'],
        'Katihar'         => ['Katihar', 'Manihari', 'Barsoi'],
        'Munger'          => ['Munger', 'Jamalpur', 'Tarapur'],
        'Bhojpur'         => ['Arrah', 'Piro', 'Jagdishpur'],
        'Rohtas'          => ['Sasaram', 'Dehri', 'Bikramganj'],
        'Aurangabad'      => ['Aurangabad City', 'Daudnagar', 'Obra'],
        'East Champaran'  => ['Motihari', 'Raxaul', 'Bettiah City'],
        'West Champaran'  => ['Bettiah', 'Bagaha', 'Narkatiaganj'],
        'Gopalganj'       => ['Gopalganj City', 'Hathua', 'Sidhwalia'],
        'Madhubani'       => ['Madhubani', 'Jaynagar', 'Pandaul'],
        'Sitamarhi'       => ['Sitamarhi', 'Pupri', 'Riga'],
    ];

    public function run(): void
    {
        foreach ($this->cities as $districtName => $cityNames) {
            $district = District::where('name', $districtName)->first();

            if (!$district) {
                continue;
            }

            foreach ($cityNames as $cityName) {
                $slug = Str::slug($cityName);
                City::firstOrCreate(
                    ['district_id' => $district->id, 'slug' => $slug],
                    [
                        'district_id' => $district->id,
                        'name' => $cityName,
                        'slug' => $slug,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
