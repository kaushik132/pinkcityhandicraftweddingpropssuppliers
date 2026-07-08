<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $wedding   = BlogCategory::where('slug', 'wedding-decor')->first()->id;
        $home      = BlogCategory::where('slug', 'home-decor')->first()->id;
        $handicraft = BlogCategory::where('slug', 'handicrafts')->first()->id;
        $festive   = BlogCategory::where('slug', 'festive-decor')->first()->id;
        $textiles  = BlogCategory::where('slug', 'textiles-fabrics')->first()->id;
        $idols     = BlogCategory::where('slug', 'idols-figurines')->first()->id;

        $blogs = [
            [
                'blog_category_id' => $wedding,
                'title' => 'Top 10 Must-Have Wedding Props for a Royal Celebration',
                'slug' => 'top-10-wedding-props-royal-celebration',
                'image' => 'wedding-props.jpg',
                'excerpt' => 'Make your big day unforgettable with these stunning décor essentials.',
                'content' => '<h2>1. Traditional Mandap Décor</h2><p>A beautifully decorated mandap sets the tone for the entire ceremony. Use flowers, drapes, and traditional motifs to create a regal setup.</p><h2>2. Welcome Props for Guests</h2><p>Handcrafted welcome boards, floral torans, and personalized signage make guests feel special from the moment they arrive.</p>',
                'read_time' => 7,
                'views' => 245,
                'published_at' => Carbon::parse('2024-05-20'),
            ],
            [
                'blog_category_id' => $home,
                'title' => '5 Easy Ways to Add a Royal Touch to Your Home',
                'slug' => '5-easy-ways-royal-touch-home',
                'image' => 'royal-home.jpg',
                'excerpt' => 'Simple décor ideas to bring traditional charm to modern spaces.',
                'content' => '<h2>1. Incorporate Traditional Handicrafts</h2><p>Handcrafted pieces carry the soul of Indian artistry. From hand-painted vases and carved wooden boxes to brass artifacts, these pieces instantly add a royal and ethnic vibe to your home.</p><h2>2. Use Rich Colors and Textures</h2><p>Royal homes often feature rich colors like maroons, royal blue, gold and deep green. You can bring this feel with velvet cushions, silk curtains, and handwoven rugs.</p>',
                'read_time' => 6,
                'views' => 189,
                'published_at' => Carbon::parse('2024-05-15'),
            ],
            [
                'blog_category_id' => $handicraft,
                'title' => 'The Beauty of Handcrafted Pottery: A Timeless Art',
                'slug' => 'beauty-of-handcrafted-pottery',
                'image' => 'pottery.jpg',
                'excerpt' => 'Discover the stories and significance behind handmade pottery.',
                'content' => '<h2>An Ancient Craft</h2><p>Pottery making in India dates back thousands of years, with each region developing its own distinct style and technique passed down through generations.</p><h2>Why Choose Handmade Pottery</h2><p>Each piece is unique, carrying the subtle imperfections and character that mass-produced items simply cannot replicate.</p>',
                'read_time' => 5,
                'views' => 132,
                'published_at' => Carbon::parse('2024-05-08'),
            ],
            [
                'blog_category_id' => $festive,
                'title' => 'Décor Ideas for Diwali to Light Up Your Home',
                'slug' => 'decor-ideas-diwali-light-up-home',
                'image' => 'diwali-decor.jpg',
                'excerpt' => 'Transform your space into a festival celebration with these ideas.',
                'content' => '<h2>Diyas and Lanterns</h2><p>Traditional clay diyas paired with modern lanterns create a warm, festive glow throughout your home.</p><h2>Rangoli and Floral Accents</h2><p>A colorful rangoli at the entrance combined with fresh marigold garlands instantly uplifts the festive spirit.</p>',
                'read_time' => 4,
                'views' => 98,
                'published_at' => Carbon::parse('2024-05-02'),
            ],
            [
                'blog_category_id' => $textiles,
                'title' => 'Rajasthani Textiles: Heritage Woven with Love',
                'slug' => 'rajasthani-textiles-heritage-woven',
                'image' => 'rajasthani-textiles.jpg',
                'excerpt' => 'Explore the rich history and techniques of traditional weaving.',
                'content' => '<h2>The Art of Block Printing</h2><p>Rajasthan is renowned for its intricate hand block printing techniques, passed down through generations of skilled artisans.</p><h2>Bandhani and Leheriya</h2><p>These traditional tie-dye techniques create vibrant patterns that are instantly recognizable as part of Rajasthan\'s textile heritage.</p>',
                'read_time' => 6,
                'views' => 76,
                'published_at' => Carbon::parse('2024-04-28'),
            ],
            [
                'blog_category_id' => $idols,
                'title' => 'Brass Idols: How to Choose the Right One',
                'slug' => 'brass-idols-how-to-choose-right-one',
                'image' => 'brass-idols.jpg',
                'excerpt' => 'A guide to selecting authentic and meaningful brass figurines.',
                'content' => '<h2>Check the Craftsmanship</h2><p>Authentic brass idols show fine detailing in facial features and ornamentation, a hallmark of skilled artisan work.</p><h2>Understanding Weight and Finish</h2><p>Genuine brass pieces have a certain heft to them and a warm, lustrous finish that distinguishes them from cheaper alloys.</p>',
                'read_time' => 5,
                'views' => 54,
                'published_at' => Carbon::parse('2024-04-20'),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['slug' => $blog['slug']], $blog);
        }
    }
}
