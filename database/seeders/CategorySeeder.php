<?php
namespace Database\Seeders;

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'All'
        ]);

        Category::create([
            'name' => 'Hand Bags'
        ]);

        Category::create([
            'name' => 'Foot wears'
        ]);

        Category::create([
            'name' => 'Jewelries'
        ]);

        Category::create([
            'name' => 'Brands'
        ]);
    }
}
