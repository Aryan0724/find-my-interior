<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\SeoPage;
class SeoPageSeeder extends Seeder {
  public function run(): void {
  SeoPage::unguard();

        SeoPage::create([
            'url_path' => '/search?category=interior-designers&city=patna', 'title' => 'Best Interior Designer Patna | Find My Interior',
            'meta_description' => 'Find the top verified Interior Designer Patna. Get free quotes and read reviews.',
            'h1_heading' => 'Top Interior Designer Patna', 'content' => 'Browse our curated list of Interior Designer Patna.'
        ]);
        
        SeoPage::create([
            'url_path' => '/search?category=architects&city=patna', 'title' => 'Best Architect Patna | Find My Interior',
            'meta_description' => 'Find the top verified Architect Patna. Get free quotes and read reviews.',
            'h1_heading' => 'Top Architect Patna', 'content' => 'Browse our curated list of Architect Patna.'
        ]);
        
        SeoPage::create([
            'url_path' => '/search?category=builders&city=patna', 'title' => 'Best Builder Patna | Find My Interior',
            'meta_description' => 'Find the top verified Builder Patna. Get free quotes and read reviews.',
            'h1_heading' => 'Top Builder Patna', 'content' => 'Browse our curated list of Builder Patna.'
        ]);
        
        SeoPage::create([
            'url_path' => '/search?category=contractors&city=patna', 'title' => 'Best Contractor Patna | Find My Interior',
            'meta_description' => 'Find the top verified Contractor Patna. Get free quotes and read reviews.',
            'h1_heading' => 'Top Contractor Patna', 'content' => 'Browse our curated list of Contractor Patna.'
        ]);
        
        SeoPage::create([
            'url_path' => '/search?category=modular-kitchens&city=patna', 'title' => 'Best Kitchen Designer Patna | Find My Interior',
            'meta_description' => 'Find the top verified Kitchen Designer Patna. Get free quotes and read reviews.',
            'h1_heading' => 'Top Kitchen Designer Patna', 'content' => 'Browse our curated list of Kitchen Designer Patna.'
        ]);
        
        SeoPage::create([
            'url_path' => '/search?category=tiles&city=patna', 'title' => 'Best Tiles Supplier Patna | Find My Interior',
            'meta_description' => 'Find the top verified Tiles Supplier Patna. Get free quotes and read reviews.',
            'h1_heading' => 'Top Tiles Supplier Patna', 'content' => 'Browse our curated list of Tiles Supplier Patna.'
        ]);
          }
}
