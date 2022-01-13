<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Belt Bag',
            'description' => 'This item is for demo project and its description can be modified for every item as needed.',
            'image' => 'bag_1.png',
            'price' => 18,
            'size' => '12 cm',
            'colors' => ['#ff0000' , '#00ff00', '#0000ff'],
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Office Bag',
            'description' => 'This item is for demo project and its description can be modified for every item as needed.',
            'image' => 'bag_2.png',
            'price' => 19,
            'size' => '12 cm',
            'colors' => ['#ff0000' , '#00ff00', '#0000ff'],
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Work Bag',
            'description' => 'This item is for demo project and its description can be modified for every item as needed.',
            'image' => 'bag_3.png',
            'price' => 19,
            'size' => '14 cm',
            'colors' => ['#ff0000' , '#00ff00', '#0000ff'],
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Shopping Bag',
            'description' => 'This item is for demo project and its description can be modified for every item as needed.',
            'image' => 'bag_4.png',
            'price' => 23,
            'size' => '16 cm',
            'colors' => ['#ff0000' , '#00ff00', '#0000ff'],
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Party Bag',
            'description' => 'This item is for demo project and its description can be modified for every item as needed.',
            'image' => 'bag_5.png',
            'price' => 17,
            'size' => '12 cm',
            'colors' => ['#ff0000' , '#00ff00', '#0000ff'],
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Hang Top',
            'description' => 'This item is for demo project and its description can be modified for every item as needed.',
            'image' => 'bag_6.png',
            'price' => 17,
            'size' => '13 cm',
            'colors' => ['#ff0000' , '#00ff00', '#0000ff'],
        ]);
    }
}
