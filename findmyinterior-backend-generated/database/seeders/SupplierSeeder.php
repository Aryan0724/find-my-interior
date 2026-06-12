<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\SupplierProduct;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
    private array $supplierData = [
        ['company' => 'Patna Tiles & Marbles',        'city' => 'Patna',       'district' => 'Patna',       'type' => 'Tiles & Marble Supplier'],
        ['company' => 'Bihar Cement House',            'city' => 'Patna',       'district' => 'Patna',       'type' => 'Building Materials'],
        ['company' => 'Ganga Sanitary & Hardware',     'city' => 'Patna',       'district' => 'Patna',       'type' => 'Sanitary & Hardware'],
        ['company' => 'Muzaffarpur Steel Traders',     'city' => 'Muzaffarpur', 'district' => 'Muzaffarpur', 'type' => 'Steel & TMT Bars'],
        ['company' => 'Bhagalpur Wood Works',          'city' => 'Bhagalpur',   'district' => 'Bhagalpur',   'type' => 'Wood & Timber'],
        ['company' => 'Darbhanga Paint Solutions',     'city' => 'Darbhanga',   'district' => 'Darbhanga',   'type' => 'Paints & Coatings'],
        ['company' => 'Nalanda Electrical Supplies',   'city' => 'Bihar Sharif','district' => 'Nalanda',     'type' => 'Electrical Materials'],
        ['company' => 'Gaya Plumbing Store',           'city' => 'Gaya',        'district' => 'Gaya',        'type' => 'Plumbing & Pipes'],
        ['company' => 'Arrah Hardware Mart',           'city' => 'Arrah',       'district' => 'Bhojpur',     'type' => 'General Hardware'],
        ['company' => 'Samastipur Glass Works',        'city' => 'Samastipur',  'district' => 'Samastipur',  'type' => 'Glass & Aluminum'],
        ['company' => 'Chapra Granite & Stone',        'city' => 'Chapra',      'district' => 'Saran',       'type' => 'Stone & Granite'],
        ['company' => 'Purnia Modular Kitchens',       'city' => 'Purnia',      'district' => 'Purnia',      'type' => 'Modular Kitchen Materials'],
        ['company' => 'Begusarai Ceramic World',       'city' => 'Begusarai',   'district' => 'Begusarai',   'type' => 'Ceramic & Vitrified Tiles'],
        ['company' => 'Katihar Waterproofing Solutions','city' => 'Katihar',    'district' => 'Katihar',     'type' => 'Waterproofing'],
        ['company' => 'Siwan Flooring Experts',        'city' => 'Siwan',       'district' => 'Siwan',       'type' => 'Flooring Materials'],
        ['company' => 'Munger Roofing Materials',      'city' => 'Munger',      'district' => 'Munger',      'type' => 'Roofing & Sheets'],
        ['company' => 'Sasaram Stone Quarry Traders',  'city' => 'Sasaram',     'district' => 'Rohtas',      'type' => 'Natural Stone'],
        ['company' => 'Motihari Cement & Aggregates',  'city' => 'Motihari',    'district' => 'East Champaran','type' => 'Cement & Aggregates'],
        ['company' => 'Hajipur PVC & UPVC Windows',   'city' => 'Hajipur',     'district' => 'Vaishali',    'type' => 'Doors & Windows'],
        ['company' => 'Bhojpur Interiors Supply Co',   'city' => 'Arrah',       'district' => 'Bhojpur',     'type' => 'Interior Materials'],
    ];

    private array $productTemplates = [
        ['name' => 'Premium Vitrified Tiles',  'category' => 'Tiles', 'unit' => 'per sqft', 'min' => 45,  'max' => 120],
        ['name' => 'Italian Marble Slabs',      'category' => 'Marble', 'unit' => 'per sqft', 'min' => 150, 'max' => 500],
        ['name' => 'OPC 53 Grade Cement',       'category' => 'Cement', 'unit' => 'per bag',  'min' => 340, 'max' => 420],
        ['name' => 'TMT Steel Bars 12mm',       'category' => 'Steel',  'unit' => 'per kg',   'min' => 60,  'max' => 75],
        ['name' => 'Teak Wood Frames',          'category' => 'Wood',   'unit' => 'per sqft', 'min' => 200, 'max' => 450],
    ];

    public function run(): void
    {
        foreach ($this->supplierData as $index => $data) {
            $user = User::firstOrCreate(
                ['email' => 'supplier' . ($index + 1) . '@example.com'],
                [
                    'name'              => $data['company'] . ' Account',
                    'phone'             => '9' . str_pad(rand(100000000, 999999999), 9, '0', STR_PAD_LEFT),
                    'password'          => Hash::make('Supplier@123'),
                    'role'              => 'supplier',
                    'is_active'         => true,
                    'email_verified_at' => now(),
                ]
            );

            $slug = Str::slug($data['company']) . '-' . Str::random(4);
            $supplier = Supplier::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'company_name'  => $data['company'],
                    'slug'          => $slug,
                    'tagline'       => 'Quality materials, trusted by Bihar\'s top builders',
                    'phone'         => $user->phone,
                    'email'         => $user->email,
                    'city'          => $data['city'],
                    'district'      => $data['district'],
                    'business_type' => $data['type'],
                    'avg_rating'    => round(rand(35, 50) / 10, 1),
                    'review_count'  => rand(3, 25),
                    'is_verified'   => rand(0, 1) === 1,
                    'is_featured'   => $index < 4,
                    'status'        => 'active',
                ]
            );

            // 5 products per supplier
            foreach ($this->productTemplates as $pIndex => $product) {
                $pSlug = Str::slug($product['name'] . ' ' . $data['company']) . '-' . Str::random(4);
                SupplierProduct::firstOrCreate(
                    ['slug' => $pSlug],
                    [
                        'supplier_id' => $supplier->id,
                        'name'        => $product['name'],
                        'slug'        => $pSlug,
                        'description' => 'High-quality ' . $product['name'] . ' available in Patna and across Bihar. Competitive pricing with bulk discounts. COD available.',
                        'category'    => $product['category'],
                        'unit'        => $product['unit'],
                        'price_min'   => $product['min'],
                        'price_max'   => $product['max'],
                        'is_active'   => true,
                    ]
                );
            }
        }
    }
}
