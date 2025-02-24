<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\SaleInvoice;
use App\SaleQuotation;

class PrintController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'isAdmin',]);
    }

    /**
     * Show the sale invoice print view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function printSaleInvoice($saleInvoiceId): View
    {
        $saleInvoice = SaleInvoice::find($saleInvoiceId);

        return view('dashboard.print.sale-invoice')
            ->with('saleInvoice', $saleInvoice);
    }

    /**
     * Show the sale quotation print view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function printSaleQuotation($saleQuotationId): View
    {
        $saleQuotation = SaleQuotation::find($saleQuotationId);

        return view('dashboard.print.sale-quotation')
            ->with('saleQuotation', $saleQuotation);
    }
}
