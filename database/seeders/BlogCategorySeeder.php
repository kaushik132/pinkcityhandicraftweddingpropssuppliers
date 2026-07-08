<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Wedding Décor',      'slug' => 'wedding-decor',      'icon' => 'fa-solid fa-ring'],
            ['name' => 'Home Décor',         'slug' => 'home-decor',         'icon' => 'fa-solid fa-house'],
            ['name' => 'Handicrafts',        'slug' => 'handicrafts',        'icon' => 'fa-solid fa-hand-sparkles'],
            ['name' => 'Festive Décor',      'slug' => 'festive-decor',      'icon' => 'fa-solid fa-lightbulb'],
            ['name' => 'Textiles & Fabrics', 'slug' => 'textiles-fabrics',   'icon' => 'fa-solid fa-scroll'],
            ['name' => 'Idols & Figurines',  'slug' => 'idols-figurines',    'icon' => 'fa-solid fa-chess-king'],
        ];

        foreach ($categories as $cat) {
            BlogCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
