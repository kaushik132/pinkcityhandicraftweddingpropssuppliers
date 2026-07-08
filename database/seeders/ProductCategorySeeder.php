<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
    ['name' => 'Wedding Prop', 'slug' => 'wedding-prop'],
    ['name' => 'Metal Figurines', 'slug' => 'metal-figurines'],
    ['name' => 'Puppets & Folk Art', 'slug' => 'puppets-folk-art'],
    ['name' => 'Lamps & Lanterns', 'slug' => 'lamps-lanterns'],
    ['name' => 'Antique & Vintage', 'slug' => 'antique-vintage'],
    ['name' => 'Pottery & Ceramics', 'slug' => 'pottery-ceramics'],
];
foreach ($categories as $c) {
    \App\Models\ProductCategory::updateOrCreate(['slug' => $c['slug']], $c);
}
    }
}
