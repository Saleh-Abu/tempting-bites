<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Birthday Cakes',
                'slug' => 'birthday-cakes',
            ],

            [
                'name' => 'Anniversary Cakes',
                'slug' => 'anniversary-cakes',
            ],

            [
                'name' => 'Wedding Cakes',
                'slug' => 'wedding-cakes',
            ],

            [
                'name' => 'Eggless Cakes',
                'slug' => 'eggless-cakes',
            ],

            [
                'name' => 'Premium Cakes',
                'slug' => 'premium-cakes',
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}