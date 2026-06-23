<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\SeoPage;
class SeoPageSeeder extends Seeder {
  public function run(): void {
  SeoPage::unguard();

        SeoPage::create([
            'slug' => '/search?category=interior-designers&city=patna', 'title' => 'Best Interior Designer Patna | Find My Interior',
            'meta_description' => 'Find the top verified Interior Designer Patna. Get free quotes and read reviews.'
        ]);
        
        SeoPage::create([
            'slug' => '/search?category=architects&city=patna', 'title' => 'Best Architect Patna | Find My Interior',
            'meta_description' => 'Find the top verified Architect Patna. Get free quotes and read reviews.'
        ]);
        
        SeoPage::create([
            'slug' => '/search?category=builders&city=patna', 'title' => 'Best Builder Patna | Find My Interior',
            'meta_description' => 'Find the top verified Builder Patna. Get free quotes and read reviews.'
        ]);
        
        SeoPage::create([
            'slug' => '/search?category=contractors&city=patna', 'title' => 'Best Contractor Patna | Find My Interior',
            'meta_description' => 'Find the top verified Contractor Patna. Get free quotes and read reviews.'
        ]);
        
        SeoPage::create([
            'slug' => '/search?category=modular-kitchens&city=patna', 'title' => 'Best Kitchen Designer Patna | Find My Interior',
            'meta_description' => 'Find the top verified Kitchen Designer Patna. Get free quotes and read reviews.'
        ]);
        
        SeoPage::create([
            'slug' => '/search?category=tiles&city=patna', 'title' => 'Best Tiles Supplier Patna | Find My Interior',
            'meta_description' => 'Find the top verified Tiles Supplier Patna. Get free quotes and read reviews.'
        ]);
          }
}
