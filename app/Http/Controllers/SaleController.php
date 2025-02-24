<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\SeatTable;

class SaleController extends Controller
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
     * Show the dashboard seat table view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $seatTable = SeatTable::first();

        return view('dashboard.sale')
            ->with('seatTable' , $seatTable);
    }

    /**
     * Show the dashboard takeaway view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function takeaway(): View
    {
        return view('dashboard.takeaway');
    }

    /**
     * Show the dashboard sale invoice view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saleInvoice(): View
    {
        return view('dashboard.sale-invoice');
    }
}
