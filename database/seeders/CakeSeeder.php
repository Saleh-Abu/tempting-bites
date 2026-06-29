<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cake;

class CakeSeeder extends Seeder
{
    public function run(): void
    {
        $cakes = [

            [
                'category_id'=>1,
                'name'=>'Chocolate Truffle',
                'slug'=>'chocolate-truffle',
                'description'=>'Rich chocolate truffle cake perfect for birthdays.',
                'flavour'=>'Chocolate',
                'weight'=>'1 Kg',
                'egg_type'=>'Egg',
                'price'=>699,
                'discount_price'=>649,
                'stock'=>20,
                'image'=>'chocolate-truffle.jpg',
                'is_featured'=>1,
            ],

            [
                'category_id'=>1,
                'name'=>'Red Velvet',
                'slug'=>'red-velvet',
                'description'=>'Soft red velvet cake with cream cheese frosting.',
                'flavour'=>'Red Velvet',
                'weight'=>'1 Kg',
                'egg_type'=>'Eggless',
                'price'=>899,
                'discount_price'=>849,
                'stock'=>15,
                'image'=>'red-velvet.jpg',
                'is_featured'=>1,
            ],

            [
                'category_id'=>1,
                'name'=>'Black Forest',
                'slug'=>'black-forest',
                'description'=>'Classic black forest with fresh cream.',
                'flavour'=>'Chocolate',
                'weight'=>'500 gm',
                'egg_type'=>'Egg',
                'price'=>499,
                'discount_price'=>449,
                'stock'=>30,
                'image'=>'black-forest.jpg',
                'is_featured'=>0,
            ],

            [
                'category_id'=>1,
                'name'=>'Pineapple Delight',
                'slug'=>'pineapple-delight',
                'description'=>'Fresh pineapple cake with juicy toppings.',
                'flavour'=>'Pineapple',
                'weight'=>'1 Kg',
                'egg_type'=>'Eggless',
                'price'=>599,
                'discount_price'=>549,
                'stock'=>22,
                'image'=>'pineapple.jpg',
                'is_featured'=>0,
            ],

            [
                'category_id'=>1,
                'name'=>'Butterscotch Cake',
                'slug'=>'butterscotch-cake',
                'description'=>'Crunchy butterscotch cake.',
                'flavour'=>'Butterscotch',
                'weight'=>'2 Kg',
                'egg_type'=>'Egg',
                'price'=>1199,
                'discount_price'=>1099,
                'stock'=>10,
                'image'=>'butterscotch.jpg',
                'is_featured'=>1,
            ],

            [
                'category_id'=>1,
                'name'=>'Oreo Blast',
                'slug'=>'oreo-blast',
                'description'=>'Loaded Oreo chocolate cake.',
                'flavour'=>'Chocolate',
                'weight'=>'1 Kg',
                'egg_type'=>'Egg',
                'price'=>799,
                'discount_price'=>749,
                'stock'=>18,
                'image'=>'oreo.jpg',
                'is_featured'=>1,
            ],

            [
                'category_id'=>1,
                'name'=>'KitKat Cake',
                'slug'=>'kitkat-cake',
                'description'=>'Chocolate cake topped with KitKat.',
                'flavour'=>'Chocolate',
                'weight'=>'2 Kg',
                'egg_type'=>'Egg',
                'price'=>1499,
                'discount_price'=>1399,
                'stock'=>8,
                'image'=>'kitkat.jpg',
                'is_featured'=>1,
            ],

            [
                'category_id'=>1,
                'name'=>'Blueberry Cake',
                'slug'=>'blueberry-cake',
                'description'=>'Fresh blueberry delight.',
                'flavour'=>'Blueberry',
                'weight'=>'1 Kg',
                'egg_type'=>'Eggless',
                'price'=>899,
                'discount_price'=>849,
                'stock'=>14,
                'image'=>'blueberry.jpg',
                'is_featured'=>0,
            ],

            [
                'category_id'=>1,
                'name'=>'Vanilla Cake',
                'slug'=>'vanilla-cake',
                'description'=>'Classic vanilla sponge cake.',
                'flavour'=>'Vanilla',
                'weight'=>'1 Kg',
                'egg_type'=>'Egg',
                'price'=>649,
                'discount_price'=>599,
                'stock'=>25,
                'image'=>'vanilla.jpg',
                'is_featured'=>1,
            ],

            [
                'category_id'=>1,
                'name'=>'Strawberry Cake',
                'slug'=>'strawberry-cake',
                'description'=>'Fresh strawberry cream cake.',
                'flavour'=>'Strawberry',
                'weight'=>'500 gm',
                'egg_type'=>'Eggless',
                'price'=>599,
                'discount_price'=>549,
                'stock'=>16,
                'image'=>'strawberry.jpg',
                'is_featured'=>0,
            ],

            [
                'category_id'=>1,
                'name'=>'Belgian Chocolate',
                'slug'=>'belgian-chocolate',
                'description'=>'Premium Belgian chocolate cake.',
                'flavour'=>'Chocolate',
                'weight'=>'2 Kg',
                'egg_type'=>'Egg',
                'price'=>1999,
                'discount_price'=>1899,
                'stock'=>6,
                'image'=>'belgian.jpg',
                'is_featured'=>1,
            ],

            [
                'category_id'=>1,
                'name'=>'Rasmalai Cake',
                'slug'=>'rasmalai-cake',
                'description'=>'Fusion rasmalai cake.',
                'flavour'=>'Rasmalai',
                'weight'=>'1 Kg',
                'egg_type'=>'Egg',
                'price'=>1099,
                'discount_price'=>999,
                'stock'=>10,
                'image'=>'rasmalai.jpg',
                'is_featured'=>1,
            ],

            [
                'category_id'=>1,
                'name'=>'Fruit Cake',
                'slug'=>'fruit-cake',
                'description'=>'Mixed fruit celebration cake.',
                'flavour'=>'Mixed Fruit',
                'weight'=>'1 Kg',
                'egg_type'=>'Eggless',
                'price'=>999,
                'discount_price'=>949,
                'stock'=>12,
                'image'=>'fruit.jpg',
                'is_featured'=>0,
            ],

            [
                'category_id'=>1,
                'name'=>'Ferrero Rocher',
                'slug'=>'ferrero-rocher',
                'description'=>'Luxury Ferrero Rocher cake.',
                'flavour'=>'Chocolate',
                'weight'=>'2 Kg',
                'egg_type'=>'Egg',
                'price'=>1899,
                'discount_price'=>1799,
                'stock'=>7,
                'image'=>'ferrero.jpg',
                'is_featured'=>1,
            ],

        ];

        foreach ($cakes as $cake) {
            Cake::create($cake);
        }
    }
}