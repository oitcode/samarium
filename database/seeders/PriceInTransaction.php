<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\SaleInvoiceItem;
use App\Product;

class PriceInTransaction extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Get all sale_invoice_items
        // Foreach sale invoice item
        //    Get the product
        //    Set its selling_price as price_per_unit of sii
        
        $saleInvoiceItems = SaleInvoiceItem::all();

        foreach ($saleInvoiceItems as $saleInvoiceItem) {

            $prodcut = Product::find($saleInvoiceItem->product_id);

            if (! $saleInvoiceItem->price_per_unit) {
                $saleInvoiceItem->price_per_unit = $prodcut->selling_price;
                $saleInvoiceItem->save();
            }
        }
    }
}
