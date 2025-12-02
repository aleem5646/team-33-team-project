<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ProductController extends Controller{
public function show($id)
{
$products = [
    1 => [
        'id' => 1,
        'name' => 'Bamboo Dish Brush',
        'image' => 'bamboo_dish_brush.png',
        'price' => 9.99,
        'information' => 'Eco-friendly bamboo dish brush.',
        'description' => 'Durable and sustainable, perfect for cleaning dishes.',
        'carbon_impact' => '2 ± 0.5',
        'reviews' => [
            ['rating' => 4, 'comment' => 'Works well and eco-friendly!'],
            ['rating' => 5, 'comment' => 'Love it, lasts a long time.'],
        ],
    ],
    2 => [
        'id' => 2,
        'name' => 'Bamboo Pen',
        'image' => 'bamboo_pen.png',
        'price' => 3.50,
        'information' => 'Smooth writing bamboo pen.',
        'description' => 'Stylish and eco-friendly pen made from bamboo.',
        'carbon_impact' => '0.5 ± 0.1',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Writes perfectly!'],
        ],
    ],
    3 => [
        'id' => 3,
        'name' => 'Bamboo Plates',
        'image' => 'bamboo_plates.png',
        'price' => 14.99,
        'information' => 'Set of eco-friendly bamboo plates.',
        'description' => 'Reusable, stylish, and biodegradable.',
        'carbon_impact' => '3 ± 0.7',
        'reviews' => [
            ['rating' => 4, 'comment' => 'Great quality!'],
        ],
    ],
    4 => [
        'id' => 4,
        'name' => 'Bamboo Toothbrush',
        'image' => 'bamboo_toothbrush.png',
        'price' => 5.99,
        'information' => 'Sustainable bamboo toothbrush.',
        'description' => 'Soft bristles, biodegradable handle.',
        'carbon_impact' => '1 ± 0.2',
        'reviews' => [
            ['rating' => 5, 'comment' => 'My teeth feel great!'],
        ],
    ],
    5 => [
        'id' => 5,
        'name' => 'Beeswax Food Wraps',
        'image' => 'beeswax_food_wraps.png',
        'price' => 12.99,
        'information' => 'Reusable beeswax wraps for food.',
        'description' => 'Eco-friendly alternative to plastic wrap.',
        'carbon_impact' => '0.8 ± 0.1',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Keeps food fresh longer!'],
        ],
    ],
    6 => [
        'id' => 6,
        'name' => 'Biodegradable Paper Tape',
        'image' => 'biodegradable_paper_tape.png',
        'price' => 4.99,
        'information' => 'Eco-friendly paper tape.',
        'description' => 'Perfect for wrapping gifts sustainably.',
        'carbon_impact' => '0.2 ± 0.05',
        'reviews' => [
            ['rating' => 4, 'comment' => 'Strong and eco-friendly.'],
        ],
    ],
    7 => [
        'id' => 7,
        'name' => 'Compostable Kitchen Sponges',
        'image' => 'compostable_kitchen_sponges.png',
        'price' => 6.99,
        'information' => 'Biodegradable kitchen sponges.',
        'description' => 'Compostable and durable for everyday use.',
        'carbon_impact' => '1 ± 0.3',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Very absorbent and eco-friendly.'],
        ],
    ],
    8 => [
        'id' => 8,
        'name' => 'Cork Wallet',
        'image' => 'cork_wallet.png',
        'price' => 19.99,
        'information' => 'Stylish vegan cork wallet.',
        'description' => 'Lightweight, durable, and eco-conscious.',
        'carbon_impact' => '2 ± 0.4',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Looks great and durable.'],
        ],
    ],
    9 => [
        'id' => 9,
        'name' => 'Green Bottle Mineral Water',
        'image' => 'green_bottle_mineral_water.png',
        'price' => 1.99,
        'information' => 'Reusable mineral water bottle.',
        'description' => 'Durable, BPA-free, eco-friendly.',
        'carbon_impact' => '0.3 ± 0.05',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Perfect for daily use.'],
        ],
    ],
    10 => [
        'id' => 10,
        'name' => 'HB Pencils',
        'image' => 'HB_pencils.png',
        'price' => 2.99,
        'information' => 'Eco-friendly HB pencils.',
        'description' => 'Smooth writing and biodegradable.',
        'carbon_impact' => '0.1 ± 0.02',
        'reviews' => [
            ['rating' => 4, 'comment' => 'Great for sketches.'],
        ],
    ],
    11 => [
        'id' => 11,
        'name' => 'Hemp Socks',
        'image' => 'hemp_socks.png',
        'price' => 9.50,
        'information' => 'Comfortable hemp socks.',
        'description' => 'Breathable, sustainable, and soft.',
        'carbon_impact' => '0.5 ± 0.1',
        'reviews' => [
            ['rating' => 5, 'comment' => 'So comfortable!'],
        ],
    ],
    12 => [
        'id' => 12,
        'name' => 'Lunch Box',
        'image' => 'lunch_box.png',
        'price' => 15.99,
        'information' => 'Eco-friendly lunch box.',
        'description' => 'Durable, reusable, and compact.',
        'carbon_impact' => '1 ± 0.2',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Keeps food fresh.'],
        ],
    ],
    13 => [
        'id' => 13,
        'name' => 'Organic Cotton Tote Bag',
        'image' => 'organic_cotton_tote_bag.png',
        'price' => 12.50,
        'information' => 'Reusable cotton tote bag.',
        'description' => 'Perfect for shopping and eco-conscious use.',
        'carbon_impact' => '0.4 ± 0.1',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Very sturdy and eco-friendly.'],
        ],
    ],
    14 => [
        'id' => 14,
        'name' => 'Recycled Fabric Backpack',
        'image' => 'recycled_fabric_backpack.png',
        'price' => 35.99,
        'information' => 'Backpack made from recycled fabric.',
        'description' => 'Durable and eco-friendly for daily use.',
        'carbon_impact' => '3 ± 0.5',
        'reviews' => [
            ['rating' => 4, 'comment' => 'Good quality and sustainable.'],
        ],
    ],
    15 => [
        'id' => 15,
        'name' => 'Recycled Paper Folder',
        'image' => 'recycled_paper_folder.png',
        'price' => 2.50,
        'information' => 'Folder made from recycled paper.',
        'description' => 'Ideal for office or school use.',
        'carbon_impact' => '0.2 ± 0.05',
        'reviews' => [
            ['rating' => 4, 'comment' => 'Eco-friendly and functional.'],
        ],
    ],
    16 => [
        'id' => 16,
        'name' => 'Recycled Paper Notebook',
        'image' => 'recycled_paper_notebook.png',
        'price' => 4.50,
        'information' => 'Notebook made from recycled paper.',
        'description' => 'Great for journaling and note-taking.',
        'carbon_impact' => '0.3 ± 0.05',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Smooth paper, love it!'],
        ],
    ],
    17 => [
        'id' => 17,
        'name' => 'Reusable Cotton Makeup Remover Pads',
        'image' => 'reusable_cotton_makeup_remover_pads.png',
        'price' => 7.99,
        'information' => 'Washable cotton pads for makeup removal.',
        'description' => 'Sustainable alternative to disposable pads.',
        'carbon_impact' => '0.5 ± 0.1',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Works perfectly!'],
        ],
    ],
    18 => [
        'id' => 18,
        'name' => 'Reusable Paperless Kitchen Towels',
        'image' => 'reusable_paperless_kitchen_towels.png',
        'price' => 9.50,
        'information' => 'Eco-friendly reusable kitchen towels.',
        'description' => 'Durable, washable, and sustainable.',
        'carbon_impact' => '0.8 ± 0.2',
        'reviews' => [
            ['rating' => 4, 'comment' => 'Very absorbent.'],
        ],
    ],
    19 => [
        'id' => 19,
        'name' => 'Reusable Shopping Bags',
        'image' => 'reusable_shopping_bags.png',
        'price' => 5.99,
        'information' => 'Pack of reusable shopping bags.',
        'description' => 'Foldable and eco-friendly.',
        'carbon_impact' => '0.3 ± 0.1',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Very handy and strong.'],
        ],
    ],
    20 => [
        'id' => 20,
        'name' => 'Reusable Silicone Food Storage Bags',
        'image' => 'reusable_silicone_food_storage_bags.png',
        'price' => 12.50,
        'information' => 'Silicone bags for storing food.',
        'description' => 'Reusable and freezer safe.',
        'carbon_impact' => '1 ± 0.2',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Excellent quality!'],
        ],
    ],
    21 => [
        'id' => 21,
        'name' => 'Shampoo Bar',
        'image' => 'shampoo_bar.png',
        'price' => 8.99,
        'information' => 'Solid eco-friendly shampoo bar.',
        'description' => 'Plastic-free and long-lasting.',
        'carbon_impact' => '0.7 ± 0.1',
        'reviews' => [
            ['rating' => 5, 'comment' => 'My hair loves it!'],
        ],
    ],
    22 => [
        'id' => 22,
        'name' => 'Skincare',
        'image' => 'skincare.png',
        'price' => 15.99,
        'information' => 'Natural and organic skincare products.',
        'description' => 'Gentle on skin and environment.',
        'carbon_impact' => '1 ± 0.2',
        'reviews' => [
            ['rating' => 4, 'comment' => 'Very gentle and smells nice.'],
        ],
    ],
    23 => [
        'id' => 23,
        'name' => 'Wood Frame Sunglasses',
        'image' => 'wood_frame_sunglasses.png',
        'price' => 29.99,
        'information' => 'Stylish wood-frame sunglasses.',
        'description' => 'Lightweight and sustainable.',
        'carbon_impact' => '2 ± 0.3',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Looks great and eco-friendly.'],
        ],
    ],
    24 => [
        'id' => 24,
        'name' => 'Wood Hair Comb',
        'image' => 'wood_hair_comb.png',
        'price' => 6.99,
        'information' => 'Smooth wood hair comb.',
        'description' => 'Durable, gentle on hair, sustainable.',
        'carbon_impact' => '0.5 ± 0.1',
        'reviews' => [
            ['rating' => 5, 'comment' => 'My hair feels amazing!'],
        ],
    ],
    25 => [
        'id' => 25,
        'name' => 'Stainless Steel Bottle',
        'image' => 'stainless_steel_bottle.png',
        'price' => 19.99,
        'information' => 'Reusable stainless steel water bottle.',
        'description' => 'Durable, insulated, and eco-friendly.',
        'carbon_impact' => '1.5 ± 0.2',
        'reviews' => [
            ['rating' => 5, 'comment' => 'Keeps water cold all day!'],
        ],
    ],
];


    if (!isset($products[$id])) {
        abort(404);
    }

    $product = (object) $products[$id]; // convert to object
    return view('pages.product-detail', compact('product'));
}
}