<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;

class ProductCreateFromCsv extends Component
{
    use WithFileUploads;

    public $product_category_id;

    public $products_file;

    public $startMode = true;
    public $previewMode = false;

    public $lines = [];
    public $totLines;
    public $filePath;

    public function render(): View
    {
        return view('livewire.product.dashboard.product-create-from-csv');
    }

    public function preview(): void
    {
        $validatedData = $this->validate([
            'products_file' => 'required|file|max:1024',
        ]);

        /*
         * TODO: Can be done without storing the file?
         */

        $this->filePath = $this->products_file->store('csvImports');
        $contents = Storage::get($this->filePath);

        $lines = explode("\n", $contents);

        /*
         * TODO:
         *
         * For some reason last line will be of one char. 
         * Dont know why. 
         *
         * Poping it out of array to be safe.
         *
         * Fix it!
         *
         */
        array_pop($lines);

        /* Remove the first header row of csv file. */
        array_shift($lines);

        $this->totLines = count($lines);

        foreach ($lines as $line) {
            $this->lines[] = explode(',', $line);
        }

        $this->enterPreviewMode();
    }

    public function enterStartMode(): void
    {
        $this->startMode = true;
    }

    public function exitStartMode(): void
    {
        $this->startMode = false;
    }

    public function enterPreviewMode(): void
    {
        $this->exitStartMode();
        $this->previewMode = true;
    }

    public function exitPreviewMode(): void
    {
        $this->previewMode = false;
    }

    public function importFromFile(): void
    {
        foreach ($this->lines as $line) {
            if (! $line[0]) {
                /* Skip if blank product name */
                continue;
            }

            if (Product::where('name', $line[0])->first()) {
                /* Skip if product already exists. */
                continue;
            }

            $product = new Product;

            $product->name = $line[0];
            $product->description = $line[2];
            $product->selling_price = $line[3];

            /* Set the product category */
            if (ProductCategory::where('name', $line[1])->first()) {
                $product->product_category_id = ProductCategory::where('name', $line[1])->first()->product_category_id;
            } else {
                $productCategory = new ProductCategory;

                $productCategory->name = $line[1];
                $productCategory->does_sell = 'yes';
                $productCategory->save();

                $productCategory->refresh();
                $product->product_category_id = $productCategory->product_category_id;
            }

            $product->featured_product = 'no';
            $product->save();

            /* Todo: Store product image from excel/csv file. */
        }

        /* Delete the file */
        Storage::delete($this->filePath);

        $this->dispatch('exitCreateProductFromCsvMode');
    }
}
