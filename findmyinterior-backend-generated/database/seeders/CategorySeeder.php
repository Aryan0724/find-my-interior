<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    private array $categories = [
        [
            'name'        => 'Interior Designers',
            'icon'        => 'sofa',
            'description' => 'Transform your home with Bihar\'s top interior designers. Modern, traditional and contemporary styles.',
            'sort_order'  => 1,
        ],
        [
            'name'        => 'Architects',
            'icon'        => 'building',
            'description' => 'Licensed architects for residential and commercial projects across Bihar.',
            'sort_order'  => 2,
        ],
        [
            'name'        => 'Civil Contractors',
            'icon'        => 'hard-hat',
            'description' => 'Experienced civil contractors for construction, renovation and remodeling.',
            'sort_order'  => 3,
        ],
        [
            'name'        => 'Builders',
            'icon'        => 'home',
            'description' => 'Trusted builders with proven residential and commercial projects in Bihar.',
            'sort_order'  => 4,
        ],
        [
            'name'        => 'Suppliers & Vendors',
            'icon'        => 'package',
            'description' => 'Construction materials, tiles, marble, cement, and hardware suppliers.',
            'sort_order'  => 5,
        ],
        [
            'name'        => 'Skilled Workers',
            'icon'        => 'wrench',
            'description' => 'Hire painters, plumbers, electricians, carpenters and other skilled workers.',
            'sort_order'  => 6,
        ],
        [
            'name'        => 'Modular Kitchen Experts',
            'icon'        => 'utensils',
            'description' => 'Modular kitchen design, installation and customization specialists.',
            'sort_order'  => 7,
        ],
        [
            'name'        => 'Painters',
            'icon'        => 'paintbrush',
            'description' => 'Professional painters for interior and exterior wall painting.',
            'sort_order'  => 8,
        ],
        [
            'name'        => 'Electricians',
            'icon'        => 'zap',
            'description' => 'Licensed electricians for wiring, fitting and electrical repairs.',
            'sort_order'  => 9,
        ],
        [
            'name'        => 'Plumbers',
            'icon'        => 'droplets',
            'description' => 'Experienced plumbers for installation, repair and maintenance.',
            'sort_order'  => 10,
        ],
    ];

    public function run(): void
    {
        foreach ($this->categories as $data) {
            Category::firstOrCreate(
                ['slug' => Str::slug($data['name'])],
                array_merge($data, [
                    'slug'      => Str::slug($data['name']),
                    'is_active' => true,
                ])
            );
        }
    }
}
