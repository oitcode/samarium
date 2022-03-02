<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $i = 0;

            for ($i=0; $i<5; $i++) {

                /* Create product categories */
                $productCategoryId = DB::table('product_category')->insertGetId([
                    'name' => $faker->name(),

                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                /* Create products */

                for ($i=0; $i<6; $i++) {
                    DB::table('product')->insert([
                        'name' => $faker->name(),
                        'product_category_id' => $productCategoryId,
                        'selling_price' => $faker->numberBetween(10, 100000),
                        'image_path' => 'products/vLsdEadcSoTXEzMjLOw5Bp0dWpN8lygkqGadYQj2.png',

                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

                unset($productCategoryId);
            }
    }
}
