<?php

use Illuminate\Database\Seeder;
use App\Product;
use Faker\Generator as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         for ($i=0; $i < 10; $i++) {
             $new_product = new Product();
             $new_product->name = $faker->word;
             $new_product->description = $faker->sentence(10);
             $new_product->price = $faker->randomFloat(2, 10, 1000);
             $new_product->save();
         }
     }
 }
