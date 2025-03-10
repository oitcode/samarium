<?php

namespace Database\Seeders;

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
        $productCategoryId = $this->createProductCategory('Bayern');
        $this->createProductsForACategory($productCategoryId);

        $productCategoryId = $this->createProductCategory('Barcelona');
        $this->createProductsForACategory($productCategoryId);

        $productCategoryId = $this->createProductCategory('Real Madrid');
        $this->createProductsForACategory($productCategoryId);

        $productCategoryId = $this->createProductCategory('Liverpool');
        $this->createProductsForACategory($productCategoryId);

        $productCategoryId = $this->createProductCategory('Chelsea');
        $this->createProductsForACategory($productCategoryId);

        /* Create products */
    }

    public function createProductCategory($name)
    {
        $productCategoryId = DB::table('product_category')->insertGetId([
            'name' => $name,
            'image_path' => 'products/vLsdEadcSoTXEzMjLOw5Bp0dWpN8lygkqGadYQj2.png',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return $productCategoryId;
    }

    public function createProductsForACategory($productCategoryId)
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i<6; $i++) {
            DB::table('product')->insert([
                'name' => $faker->name(),
                'product_category_id' => $productCategoryId,
                'selling_price' => $faker->numberBetween(10, 10000),
                'description' => 'Lorem ipsum is a sentence.',
                'image_path' => 'products/vLsdEadcSoTXEzMjLOw5Bp0dWpN8lygkqGadYQj2.png',

                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
