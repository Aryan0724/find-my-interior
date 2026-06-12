<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    private array $posts = [
        [
            'title'    => '10 Interior Design Trends for Bihar Homes in 2026',
            'category' => 'Interior Design',
            'excerpt'  => 'Discover the top interior design trends transforming Bihar homes in 2026. From earthy tones to modular furniture — here is what\'s popular this year.',
            'tags'     => ['interior design', 'home decor', 'Bihar', '2026 trends'],
        ],
        [
            'title'    => 'How to Choose the Right Interior Designer in Patna',
            'category' => 'Interior Design',
            'excerpt'  => 'A complete guide to finding and hiring the best interior designer for your home in Patna. What to look for, questions to ask, and red flags to avoid.',
            'tags'     => ['interior designer', 'Patna', 'hiring guide', 'home renovation'],
        ],
        [
            'title'    => 'Home Construction Cost in Bihar: 2026 Complete Guide',
            'category' => 'Construction',
            'excerpt'  => 'Detailed breakdown of home construction costs in Bihar. Per-square-foot rates, material costs, labour rates and tips to save money.',
            'tags'     => ['construction cost', 'Bihar', 'home building', 'civil contractor'],
        ],
        [
            'title'    => 'Best Tiles for Bihar Homes: A Buyer\'s Guide',
            'category' => 'Materials',
            'excerpt'  => 'Vitrified, ceramic or natural stone — which tile is right for Bihar\'s climate? Expert guidance on choosing the best tiles for floors and walls.',
            'tags'     => ['tiles', 'flooring', 'materials', 'supplier guide'],
        ],
        [
            'title'    => 'Modular Kitchen Design Ideas for Small Bihar Homes',
            'category' => 'Kitchen',
            'excerpt'  => 'Space-saving modular kitchen ideas perfect for smaller Bihar homes. Budget options starting from ₹80,000 with warranty.',
            'tags'     => ['modular kitchen', 'kitchen design', 'small home', 'budget kitchen'],
        ],
        [
            'title'    => 'RERA Explained: What Bihar Homebuyers Must Know',
            'category' => 'Builders',
            'excerpt'  => 'Everything Bihar homebuyers need to know about RERA registration, builder accountability and how to verify a builder\'s credentials.',
            'tags'     => ['RERA', 'builder', 'property', 'homebuyer guide'],
        ],
        [
            'title'    => 'Vastu Tips for Bihar Home Construction',
            'category' => 'Construction',
            'excerpt'  => 'Essential Vastu Shastra principles for your Bihar home. Directions, room placement and common mistakes to avoid during construction.',
            'tags'     => ['vastu', 'home construction', 'Bihar', 'traditional'],
        ],
        [
            'title'    => 'How to Find Reliable Plumbers and Electricians in Bihar',
            'category' => 'Workforce',
            'excerpt'  => 'Tips for finding verified, experienced plumbers and electricians in Bihar. What to check before hiring and how to get fair pricing.',
            'tags'     => ['plumber', 'electrician', 'skilled worker', 'hire'],
        ],
        [
            'title'    => 'Upcoming Residential Projects in Patna 2026',
            'category' => 'Real Estate',
            'excerpt'  => 'A roundup of the most anticipated residential projects launching in Patna in 2026. BHK options, pricing and possession timelines.',
            'tags'     => ['Patna', 'residential project', 'real estate', '2026'],
        ],
        [
            'title'    => 'Renovation vs New Construction: What Makes Sense in Bihar',
            'category' => 'Construction',
            'excerpt'  => 'Weighing the costs and benefits of home renovation versus new construction in Bihar. Which option is right for your budget and goals?',
            'tags'     => ['renovation', 'construction', 'Bihar', 'home improvement'],
        ],
    ];

    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            return;
        }

        foreach ($this->posts as $post) {
            $slug = Str::slug($post['title']);

            $blog = Blog::firstOrCreate(
                ['slug' => $slug],
                [
                    'author_id'   => $admin->id,
                    'title'       => $post['title'],
                    'slug'        => $slug,
                    'excerpt'     => $post['excerpt'],
                    'content'     => '<p>' . $post['excerpt'] . '</p><p>Bihar\'s home improvement and construction sector is growing rapidly. FindMyInterior.com connects homeowners with verified professionals across all 38 districts of Bihar. Whether you need an interior designer in Patna, a builder in Muzaffarpur, or a plumber in Gaya — we have you covered.</p><p>Browse our directory of verified professionals, compare quotes, and get your dream home built with confidence.</p>',
                    'category'    => $post['category'],
                    'status'      => 'published',
                    'published_at' => now()->subDays(rand(1, 60)),
                    'views_count'  => rand(100, 2000),
                ]
            );

            // Seed tags
            foreach ($post['tags'] as $tag) {
                BlogTag::firstOrCreate([
                    'blog_id' => $blog->id,
                    'tag'     => $tag,
                ]);
            }
        }
    }
}
