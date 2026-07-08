<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ProductSeeder.php
$catId = \App\Models\ProductCategory::where('slug', 'pottery-ceramics')->first()->id;

$product = \App\Models\Product::updateOrCreate(
    ['slug' => 'hand-painted-ceramic-elephant-trio'],
    [
        'product_category_id' => $catId,
        'title' => 'Hand-painted Ceramic Elephant Trio',
        'sku' => 'PC-CER-004',
        'badge' => 'Popular',
        'short_description' => 'A symbol of luck and prosperity, hand-painted with floral motifs.',
        'description' => '<p>A set of 3 hand-painted ceramic elephants in decreasing sizes...</p>',
        'price' => 1100,
        'sale_price' => 749,
        'stock' => 51,
        'rating' => 4.6,
        'reviews_count' => 316,
        'specs' => [
            'Material' => 'Ceramic, Non-toxic paint',
            'Size' => '3", 4", 5" height',
            'Craft' => 'Handmade',
            'Ships In' => '3-5 Days',
            'Weight' => 'Approx. 650g (set)',
            'Origin' => 'Jaipur, Rajasthan',
        ],
    ]
);

foreach (['ceramic-1.jpg', 'ceramic-2.jpg', 'ceramic-3.jpg'] as $i => $img) {
    \App\Models\ProductImage::create(['product_id' => $product->id, 'image' => $img, 'sort_order' => $i]);
}

// ProductSeeder.php mein existing product ke baad yeh add karo

$weddingCat  = \App\Models\ProductCategory::where('slug', 'wedding-prop')->first()->id;
$metalCat    = \App\Models\ProductCategory::where('slug', 'metal-figurines')->first()->id;
$puppetCat   = \App\Models\ProductCategory::where('slug', 'puppets-folk-art')->first()->id;
$lampCat     = \App\Models\ProductCategory::where('slug', 'lamps-lanterns')->first()->id;

$products = [
    [
        'product_category_id' => $puppetCat,
        'title' => 'Hand-painted Rajasthani Puppet Set',
        'slug' => 'hand-painted-rajasthani-puppet-set',
        'sku' => 'PC-PUP-012',
        'badge' => 'Best Seller',
        'short_description' => 'Traditional Kathputli puppets, hand-painted with vibrant folk motifs.',
        'description' => '<p>A set of colorful Rajasthani string puppets (Kathputli), handcrafted by artisans from Jaipur. Each puppet is dressed in traditional attire and hand-painted with intricate detailing.</p><p>Perfect for home décor, cultural displays, or as a unique gift representing Rajasthan\'s rich puppetry heritage.</p>',
        'price' => 2100,
        'sale_price' => 1299,
        'stock' => 38,
        'rating' => 4.4,
        'reviews_count' => 89,
        'specs' => [
            'Material' => 'Wood, Cotton Cloth',
            'Set Includes' => '4 Puppets',
            'Height' => '12-14 inches',
            'Craft' => 'Handmade',
            'Ships In' => '4-6 Days',
            'Origin' => 'Jaipur, Rajasthan',
        ],
        'ships_in_days' => 5,
        'images' => ['puppet-1.jpg', 'puppet-2.jpg'],
    ],
    [
        'product_category_id' => $metalCat,
        'title' => 'Brass Ganesha Idol with Antique Finish',
        'slug' => 'brass-ganesha-idol-antique-finish',
        'sku' => 'PC-MET-007',
        'badge' => null,
        'short_description' => 'Intricately carved brass Ganesha idol with a rich antique patina.',
        'description' => '<p>This handcrafted brass Ganesha idol brings elegance and positive energy to any space. Cast using traditional lost-wax technique and finished with an antique brass patina for an heirloom look.</p><p>Ideal for home temples, office desks, or as a housewarming gift.</p>',
        'price' => 1850,
        'sale_price' => 1399,
        'stock' => 22,
        'rating' => 4.8,
        'reviews_count' => 156,
        'specs' => [
            'Material' => 'Pure Brass',
            'Height' => '8 inches',
            'Weight' => 'Approx. 950g',
            'Craft' => 'Lost-wax Casting',
            'Finish' => 'Antique Patina',
            'Origin' => 'Jaipur, Rajasthan',
        ],
        'ships_in_days' => 6,
        'images' => ['ganesha-1.jpg', 'ganesha-2.jpg', 'ganesha-3.jpg'],
    ],
    [
        'product_category_id' => $lampCat,
        'title' => 'Moroccan Style Hanging Lantern (Set of 2)',
        'slug' => 'moroccan-hanging-lantern-set-of-2',
        'sku' => 'PC-LAM-021',
        'badge' => 'New',
        'short_description' => 'Ornate metal-cut lanterns that cast beautiful shadow patterns.',
        'description' => '<p>These Moroccan-inspired hanging lanterns feature intricate metal cutwork that creates stunning shadow patterns when lit. Comes as a set of 2 in complementary sizes.</p><p>Perfect for patios, balconies, or festive indoor décor during Diwali and weddings.</p>',
        'price' => 1600,
        'sale_price' => 999,
        'stock' => 40,
        'rating' => 4.3,
        'reviews_count' => 64,
        'specs' => [
            'Material' => 'Iron with Antique Finish',
            'Set Includes' => '2 Lanterns (Small & Medium)',
            'Height' => '10" & 14"',
            'Craft' => 'Hand-cut Metalwork',
            'Ships In' => '3-5 Days',
            'Occasion' => 'Diwali, Weddings, Patio Décor',
        ],
        'ships_in_days' => 4,
        'images' => ['lantern-1.jpg', 'lantern-2.jpg'],
    ],
    [
        'product_category_id' => $weddingCat,
        'title' => 'Royal Wedding Welcome Board with Floral Frame',
        'slug' => 'royal-wedding-welcome-board-floral-frame',
        'sku' => 'PC-WED-018',
        'badge' => 'Best Seller',
        'short_description' => 'Elegant handcrafted welcome signage for wedding entrances.',
        'description' => '<p>Make a grand first impression with this beautifully handcrafted wedding welcome board, framed with artificial floral work and traditional Rajasthani motifs.</p><p>Customizable with names and dates — perfect for wedding entrances, mehendi, and sangeet setups.</p>',
        'price' => 3500,
        'sale_price' => 2799,
        'stock' => 15,
        'rating' => 4.7,
        'reviews_count' => 41,
        'specs' => [
            'Material' => 'MDF Board, Artificial Flowers',
            'Size' => '24" x 36"',
            'Craft' => 'Handcrafted, Customizable',
            'Ships In' => '5-7 Days',
            'Occasion' => 'Wedding, Sangeet, Mehendi',
            'Origin' => 'Jaipur, Rajasthan',
        ],
        'ships_in_days' => 6,
        'images' => ['welcome-board-1.jpg', 'welcome-board-2.jpg'],
    ],
    [
    'product_category_id' => $catId, // pottery-ceramics wala, already defined upar
    'title' => 'Terracotta Warli Painted Vase Set',
    'slug' => 'terracotta-warli-painted-vase-set',
    'sku' => 'PC-CER-009',
    'badge' => 'New',
    'short_description' => 'Rustic terracotta vases hand-painted with traditional Warli art.',
    'description' => '<p>A set of 2 terracotta vases featuring authentic Warli tribal art, hand-painted by artisans using natural white pigment on earthy clay tones.</p><p>These vases bring a rustic, earthy charm to any living space and make for a thoughtful housewarming or festive gift.</p>',
    'price' => 1400,
    'sale_price' => 899,
    'stock' => 29,
    'rating' => 4.5,
    'reviews_count' => 72,
    'specs' => [
        'Material' => 'Terracotta Clay',
        'Set Includes' => '2 Vases (Small & Medium)',
        'Height' => '6" & 9"',
        'Craft' => 'Hand-painted, Warli Art',
        'Ships In' => '4-6 Days',
        'Origin' => 'Jaipur, Rajasthan',
    ],
    'ships_in_days' => 5,
    'images' => ['warli-vase-1.jpg', 'warli-vase-2.jpg'],
],
];

foreach ($products as $data) {
    $images = $data['images'];
    unset($data['images']);

    $product = \App\Models\Product::updateOrCreate(['slug' => $data['slug']], $data);

    foreach ($images as $i => $img) {
        \App\Models\ProductImage::updateOrCreate(
            ['product_id' => $product->id, 'image' => $img],
            ['sort_order' => $i]
        );
    }
}

    }


}
