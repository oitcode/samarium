<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Product;

class LiveMigrationPutStockOpeningDate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Product::where('stock_applicable', 'yes')->get() as $product) {
            $product->opening_stock_timestamp = Carbon::now()->toDateTimeString();
            $product->save();
        }
    }
}
