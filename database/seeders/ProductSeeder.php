<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Define Categories
        $categories = [
            'Fashion' => ['T-Shirt', 'Jeans', 'Jacket', 'Sneakers', 'Dress'], // Keep these for structure, though not used by products below
            'Beauty' => ['Lipstick', 'Foundation', 'Mascara', 'Perfume', 'Skincare Set'],
            'Home Goods' => ['Sofa', 'Lamp', 'Table', 'Chair', 'Bed'],
            'Foods' => ['Pizza', 'Burger', 'Sushi', 'Pasta', 'Salad'],
            'Office Supplies' => ['Calculator', 'Notebook', 'Pen', 'Paper'],
        ];

        // Create Categories
        foreach ($categories as $name => $products) {
            Category::firstOrCreate(['name' => $name]);
        }

        // Create Filters
        \App\Models\Filter::firstOrCreate(['name' => 'Fair Trade']);
        \App\Models\Filter::firstOrCreate(['name' => 'Low Carbon']);

        // Correct Eco-friendly Products Data
        $productsData = [
            [
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
                    ['rating' => 3, 'comment' => 'Good, but bristles are a bit stiff.'],
                ],
            ],
            [
                'id' => 2,
                'name' => 'Bamboo Pen',
                'image' => 'bamboo_pen.png',
                'price' => 3.50,
                'information' => 'Smooth writing bamboo pen.',
                'description' => 'Stylish and eco-friendly pen made from bamboo.',
                'carbon_impact' => '0.5 ± 0.1',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Writes perfectly!'],
                    ['rating' => 4, 'comment' => 'Nice design, comfortable to hold.'],
                    ['rating' => 5, 'comment' => 'Great eco-friendly alternative.'],
                ],
            ],
            [
                'id' => 3,
                'name' => 'Bamboo Plates',
                'image' => 'bamboo_plates.png',
                'price' => 14.99,
                'information' => 'Set of eco-friendly bamboo plates.',
                'description' => 'Reusable, stylish, and biodegradable.',
                'carbon_impact' => '3 ± 0.7',
                'reviews' => [
                    ['rating' => 4, 'comment' => 'Great quality!'],
                    ['rating' => 5, 'comment' => 'Perfect for picnics.'],
                    ['rating' => 3, 'comment' => 'A bit smaller than expected.'],
                ],
            ],
            [
                'id' => 4,
                'name' => 'Bamboo Toothbrush',
                'image' => 'bamboo_toothbrush.png',
                'price' => 5.99,
                'information' => 'Sustainable bamboo toothbrush.',
                'description' => 'Soft bristles, biodegradable handle.',
                'carbon_impact' => '1 ± 0.2',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'My teeth feel great!'],
                    ['rating' => 4, 'comment' => 'Good brush, soft bristles.'],
                    ['rating' => 5, 'comment' => 'Will buy again.'],
                ],
            ],
            [
                'id' => 5,
                'name' => 'Beeswax Food Wraps',
                'image' => 'beeswax_food_wraps.png',
                'price' => 12.99,
                'information' => 'Reusable beeswax wraps for food.',
                'description' => 'Eco-friendly alternative to plastic wrap.',
                'carbon_impact' => '0.8 ± 0.1',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Keeps food fresh longer!'],
                    ['rating' => 4, 'comment' => 'Easy to clean.'],
                    ['rating' => 3, 'comment' => 'Smell takes getting used to.'],
                ],
            ],
            [
                'id' => 6,
                'name' => 'Biodegradable Paper Tape',
                'image' => 'biodegradable_paper_tape.png',
                'price' => 4.99,
                'information' => 'Eco-friendly paper tape.',
                'description' => 'Perfect for wrapping gifts sustainably.',
                'carbon_impact' => '0.2 ± 0.05',
                'reviews' => [
                    ['rating' => 4, 'comment' => 'Strong and eco-friendly.'],
                    ['rating' => 5, 'comment' => 'Sticks well.'],
                    ['rating' => 4, 'comment' => 'Great for crafts.'],
                ],
            ],
            [
                'id' => 7,
                'name' => 'Compostable Kitchen Sponges',
                'image' => 'compostable_kitchen_sponges.png',
                'price' => 6.99,
                'information' => 'Biodegradable kitchen sponges.',
                'description' => 'Compostable and durable for everyday use.',
                'carbon_impact' => '1 ± 0.3',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Very absorbent and eco-friendly.'],
                    ['rating' => 4, 'comment' => 'Lasts a decent amount of time.'],
                    ['rating' => 5, 'comment' => 'No bad smell like plastic sponges.'],
                ],
            ],
            [
                'id' => 8,
                'name' => 'Cork Wallet',
                'image' => 'cork_wallet.png',
                'price' => 19.99,
                'information' => 'Stylish vegan cork wallet.',
                'description' => 'Lightweight, durable, and eco-conscious.',
                'carbon_impact' => '2 ± 0.4',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Looks great and durable.'],
                    ['rating' => 4, 'comment' => 'Unique texture, I like it.'],
                    ['rating' => 5, 'comment' => 'Perfect gift.'],
                ],
            ],
            [
                'id' => 9,
                'name' => 'Green Bottle Mineral Water',
                'image' => 'green_bottle_mineral_water.png',
                'price' => 1.99,
                'information' => 'Reusable mineral water bottle.',
                'description' => 'Durable, BPA-free, eco-friendly.',
                'carbon_impact' => '0.3 ± 0.05',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Perfect for daily use.'],
                    ['rating' => 4, 'comment' => 'Good size.'],
                    ['rating' => 5, 'comment' => 'Refreshing taste.'],
                ],
            ],
            [
                'id' => 10,
                'name' => 'HB Pencils',
                'image' => 'HB_pencils.png',
                'price' => 2.99,
                'information' => 'Eco-friendly HB pencils.',
                'description' => 'Smooth writing and biodegradable.',
                'carbon_impact' => '0.1 ± 0.02',
                'reviews' => [
                    ['rating' => 4, 'comment' => 'Great for sketches.'],
                    ['rating' => 5, 'comment' => 'Smooth lead.'],
                    ['rating' => 4, 'comment' => 'Good value pack.'],
                ],
            ],
            [
                'id' => 11,
                'name' => 'Hemp Socks',
                'image' => 'hemp_socks.png',
                'price' => 9.50,
                'information' => 'Comfortable hemp socks.',
                'description' => 'Breathable, sustainable, and soft.',
                'carbon_impact' => '0.5 ± 0.1',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'So comfortable!'],
                    ['rating' => 4, 'comment' => 'Warm and breathable.'],
                    ['rating' => 5, 'comment' => 'Durable material.'],
                ],
            ],
            [
                'id' => 12,
                'name' => 'Lunch Box',
                'image' => 'lunch_box.png',
                'price' => 15.99,
                'information' => 'Eco-friendly lunch box.',
                'description' => 'Durable, reusable, and compact.',
                'carbon_impact' => '1 ± 0.2',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Keeps food fresh.'],
                    ['rating' => 4, 'comment' => 'Nice compartments.'],
                    ['rating' => 5, 'comment' => 'Easy to clean.'],
                ],
            ],
            [
                'id' => 13,
                'name' => 'Organic Cotton Tote Bag',
                'image' => 'organic_cotton_tote_bag.png',
                'price' => 12.50,
                'information' => 'Reusable cotton tote bag.',
                'description' => 'Perfect for shopping and eco-conscious use.',
                'carbon_impact' => '0.4 ± 0.1',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Very sturdy and eco-friendly.'],
                    ['rating' => 4, 'comment' => 'Good size for groceries.'],
                    ['rating' => 5, 'comment' => 'Nice design.'],
                ],
            ],
            [
                'id' => 14,
                'name' => 'Recycled Fabric Backpack',
                'image' => 'recycled_fabric_backpack.png',
                'price' => 35.99,
                'information' => 'Backpack made from recycled fabric.',
                'description' => 'Durable and eco-friendly for daily use.',
                'carbon_impact' => '3 ± 0.5',
                'reviews' => [
                    ['rating' => 4, 'comment' => 'Good quality and sustainable.'],
                    ['rating' => 5, 'comment' => 'Lots of pockets.'],
                    ['rating' => 4, 'comment' => 'Comfortable straps.'],
                ],
            ],
            [
                'id' => 15,
                'name' => 'Recycled Paper Folder',
                'image' => 'recycled_paper_folder.png',
                'price' => 2.50,
                'information' => 'Folder made from recycled paper.',
                'description' => 'Ideal for office or school use.',
                'carbon_impact' => '0.2 ± 0.05',
                'reviews' => [
                    ['rating' => 4, 'comment' => 'Eco-friendly and functional.'],
                    ['rating' => 5, 'comment' => 'Sturdy enough for papers.'],
                    ['rating' => 3, 'comment' => 'Basic but does the job.'],
                ],
            ],
            [
                'id' => 16,
                'name' => 'Recycled Paper Notebook',
                'image' => 'recycled_paper_notebook.png',
                'price' => 4.50,
                'information' => 'Notebook made from recycled paper.',
                'description' => 'Great for journaling and note-taking.',
                'carbon_impact' => '0.3 ± 0.05',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Smooth paper, love it!'],
                    ['rating' => 4, 'comment' => 'Good for notes.'],
                    ['rating' => 5, 'comment' => 'Love the recycled texture.'],
                ],
            ],
            [
                'id' => 17,
                'name' => 'Reusable Cotton Makeup Remover Pads',
                'image' => 'reusable_cotton_makeup_remover_pads.png',
                'price' => 7.99,
                'information' => 'Washable cotton pads for makeup removal.',
                'description' => 'Sustainable alternative to disposable pads.',
                'carbon_impact' => '0.5 ± 0.1',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Works perfectly!'],
                    ['rating' => 5, 'comment' => 'Very soft on skin.'],
                    ['rating' => 4, 'comment' => 'Washes well.'],
                ],
            ],
            [
                'id' => 18,
                'name' => 'Reusable Paperless Kitchen Towels',
                'image' => 'reusable_paperless_kitchen_towels.png',
                'price' => 9.50,
                'information' => 'Eco-friendly reusable kitchen towels.',
                'description' => 'Durable, washable, and sustainable.',
                'carbon_impact' => '0.8 ± 0.2',
                'reviews' => [
                    ['rating' => 4, 'comment' => 'Very absorbent.'],
                    ['rating' => 5, 'comment' => 'Saves so much paper.'],
                    ['rating' => 4, 'comment' => 'Cute patterns.'],
                ],
            ],
            [
                'id' => 19,
                'name' => 'Reusable Shopping Bags',
                'image' => 'reusable_shopping_bags.png',
                'price' => 5.99,
                'information' => 'Pack of reusable shopping bags.',
                'description' => 'Foldable and eco-friendly.',
                'carbon_impact' => '0.3 ± 0.1',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Very handy and strong.'],
                    ['rating' => 4, 'comment' => 'Folds up small.'],
                    ['rating' => 5, 'comment' => 'Great for heavy items.'],
                ],
            ],
            [
                'id' => 20,
                'name' => 'Reusable Silicone Food Storage Bags',
                'image' => 'reusable_silicone_food_storage_bags.png',
                'price' => 12.50,
                'information' => 'Silicone bags for storing food.',
                'description' => 'Reusable and freezer safe.',
                'carbon_impact' => '1 ± 0.2',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Excellent quality!'],
                    ['rating' => 4, 'comment' => 'Seals tight.'],
                    ['rating' => 5, 'comment' => 'Easy to wash.'],
                ],
            ],
            [
                'id' => 21,
                'name' => 'Shampoo Bar',
                'image' => 'shampoo_bar.png',
                'price' => 8.99,
                'information' => 'Solid eco-friendly shampoo bar.',
                'description' => 'Plastic-free and long-lasting.',
                'carbon_impact' => '0.7 ± 0.1',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'My hair loves it!'],
                    ['rating' => 4, 'comment' => 'Lathers well.'],
                    ['rating' => 5, 'comment' => 'Smells amazing.'],
                ],
            ],
            [
                'id' => 22,
                'name' => 'Skincare',
                'image' => 'skincare.png',
                'price' => 15.99,
                'information' => 'Natural and organic skincare products.',
                'description' => 'Gentle on skin and environment.',
                'carbon_impact' => '1 ± 0.2',
                'reviews' => [
                    ['rating' => 4, 'comment' => 'Very gentle and smells nice.'],
                    ['rating' => 5, 'comment' => 'Great for sensitive skin.'],
                    ['rating' => 4, 'comment' => 'Hydrating.'],
                ],
            ],
            [
                'id' => 23,
                'name' => 'Wood Frame Sunglasses',
                'image' => 'wood_frame_sunglasses.png',
                'price' => 29.99,
                'information' => 'Stylish wood-frame sunglasses.',
                'description' => 'Lightweight and sustainable.',
                'carbon_impact' => '2 ± 0.3',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Looks great and eco-friendly.'],
                    ['rating' => 4, 'comment' => 'Unique style.'],
                    ['rating' => 5, 'comment' => 'Very light.'],
                ],
            ],
            [
                'id' => 24,
                'name' => 'Wood Hair Comb',
                'image' => 'wood_hair_comb.png',
                'price' => 6.99,
                'information' => 'Smooth wood hair comb.',
                'description' => 'Durable, gentle on hair, sustainable.',
                'carbon_impact' => '0.5 ± 0.1',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'My hair feels amazing!'],
                    ['rating' => 4, 'comment' => 'No static.'],
                    ['rating' => 5, 'comment' => 'Beautiful wood.'],
                ],
            ],
            [
                'id' => 25,
                'name' => 'Stainless Steel Bottle',
                'image' => 'stainless_steel_bottle.png',
                'price' => 19.99,
                'information' => 'Reusable stainless steel water bottle.',
                'description' => 'Durable, insulated, and eco-friendly.',
                'carbon_impact' => '1.5 ± 0.2',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Keeps water cold all day!'],
                    ['rating' => 4, 'comment' => 'Sturdy design.'],
                    ['rating' => 5, 'comment' => 'No metallic taste.'],
                ],
            ],
            [
                'id' => 26,
                'name' => 'Recycled Paper Solar Calculator',
                'image' => 'solar_calculator.png',
                'price' => 12.99,
                'information' => 'Solar powered calculator made from recycled paper.',
                'description' => 'Eco-friendly office essential.',
                'carbon_impact' => '0.2 ± 0.05',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Works great and looks cool!'],
                    ['rating' => 4, 'comment' => 'Buttons are responsive.'],
                    ['rating' => 5, 'comment' => 'Love the solar feature.'],
                ],
            ],
            [
                'id' => 27,
                'name' => 'Fairtrade Notebook',
                'image' => 'fairtrade_notebook.png',
                'price' => 5.99,
                'information' => 'Notebook made with fairtrade paper.',
                'description' => 'Ethically sourced and sustainable.',
                'carbon_impact' => '0.3 ± 0.05',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'High quality paper.'],
                    ['rating' => 4, 'comment' => 'Good binding.'],
                    ['rating' => 5, 'comment' => 'Perfect for school.'],
                ],
            ],
            [
                'id' => 28,
                'name' => 'Fairtrade Coffee',
                'image' => 'fairtrade_coffee.png',
                'price' => 8.99,
                'information' => 'Premium fairtrade coffee beans.',
                'description' => 'Delicious and ethically sourced.',
                'carbon_impact' => '1.2 ± 0.2',
                'reviews' => [
                    ['rating' => 5, 'comment' => 'Best coffee ever!'],
                    ['rating' => 4, 'comment' => 'Rich flavor.'],
                    ['rating' => 5, 'comment' => 'Smooth taste.'],
                ],
            ],
            [
                'id' => 29,
                'name' => 'Recycled Pens',
                'image' => 'recycled_pens.png',
                'price' => 4.99,
                'information' => 'Pack of pens made from recycled materials.',
                'description' => 'Smooth writing and eco-friendly.',
                'carbon_impact' => '0.1 ± 0.02',
                'reviews' => [
                    ['rating' => 4, 'comment' => 'Good value.'],
                    ['rating' => 5, 'comment' => 'Writes smoothly.'],
                    ['rating' => 3, 'comment' => 'Ink runs out a bit fast.'],
                ],
            ],
        ];

        // Category Mapping Logic (replicated from Controller)
        $fashionIds = [8, 11, 13, 14, 23];
        $beautyIds = [4, 21, 22, 24, 17];
        $foodIds = [9];
        $officeSuppliesIds = [26, 27, 28, 29, 2, 10, 15, 16]; // Added existing office-like items too

        $defaultUser = \App\Models\User::first();

        foreach ($productsData as $data) {
            $categoryName = 'Home Goods';
            if (in_array($data['id'], $fashionIds)) $categoryName = 'Fashion';
            elseif (in_array($data['id'], $beautyIds)) $categoryName = 'Beauty';
            elseif (in_array($data['id'], $foodIds)) $categoryName = 'Foods';
            elseif (in_array($data['id'], $officeSuppliesIds)) $categoryName = 'Office Supplies';

            $category = Category::where('name', $categoryName)->first();

            $product = Product::updateOrCreate(
                ['productId' => $data['id']],
                [
                    'categoryId' => $category->categoryId,
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'image_url' => 'imgs/' . $data['image'], // Add prefix for DB storage
                ]
            );

            // Create a default variant
            ProductVariant::updateOrCreate(
                ['productId' => $product->productId],
                [
                    'name' => 'Standard',
                    'value' => 'Default',
                    'count' => 100,
                    'price' => $data['price'],
                    'sku' => 'SKU-' . str_pad($product->productId, 5, '0', STR_PAD_LEFT),
                ]
            );

            // Create Reviews
            if (isset($data['reviews'])) {
                $users = \App\Models\User::all();
                foreach ($data['reviews'] as $index => $reviewData) {
                    // Cycle through users to avoid unique constraint violation
                    $user = $users[$index % $users->count()];
                    
                    \App\Models\ProductReview::updateOrCreate(
                        [
                            'productId' => $product->productId,
                            'userId' => $user->userId,
                        ],
                        [
                            'review' => $reviewData['comment'],
                            'rating' => $reviewData['rating'],
                        ]
                    );
                }
            }

            // Assign Filters (Randomly for demonstration, or specific logic)
            // Bamboo items (ids 1-4) are Low Carbon (2)
            // Handmade/Artisan items could be Fair Trade (1)
            
            $filters = [];
            if (str_contains(strtolower($data['name']), 'bamboo') || 
                str_contains(strtolower($data['name']), 'recycled') || 
                str_contains(strtolower($data['name']), 'solar') ||
                str_contains(strtolower($data['name']), 'green')) {
                $filters[] = 2; // Low Carbon
            }
            if ($data['price'] > 10 || str_contains(strtolower($data['name']), 'fairtrade')) { 
                $filters[] = 1; // Fair Trade
            }

            $product->filters()->sync($filters);
        }
    }
}
