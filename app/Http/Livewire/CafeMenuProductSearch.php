<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;

class CafeMenuProductSearch extends Component
{
    public $product_search_name;

    public $products;
    public $searchDone = false;

    public function render()
    {
        return view('livewire.cafe-menu-product-search');
    }

    public function search()
    {
        $validatedData = $this->validate([
            'product_search_name' => 'required',
        ]);

        $products = Product::where('name', 'like', '%'.$validatedData['product_search_name'].'%')->get();

        $this->products = $products;
        $this->searchDone = true;
    }
}
