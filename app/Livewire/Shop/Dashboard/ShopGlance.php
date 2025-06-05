<?php

namespace App\Livewire\Shop\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\SaleInvoice\SaleInvoice;
use App\Models\Purchase\Purchase;
use App\Expense;

class ShopGlance extends Component
{
    public $saleInvoiceCount;
    public $purchaseCount;
    public $expenseCount;

    public function render(): View
    {
        $this->saleInvoiceCount = SaleInvoice::all()->count();
        $this->purchaseCount = Purchase::all()->count();
        $this->expenseCount = Expense::all()->count();

        return view('livewire.shop.dashboard.shop-glance');
    }
}
