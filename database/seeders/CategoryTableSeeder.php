<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,10) as $item) {
            Category::create([
                'user_id' => $faker->numberBetween(1,10),
                'category_name' => $faker->text(25),
            ]);
        }
    }
}
