<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $seatTable = SeatTable::first();

        return view('dashboard.sale')
            ->with('seatTable' , $seatTable);
    }

    public function takeaway()
    {
        return view('dashboard.takeaway');
    }

    public function saleInvoice()
    {
        return view('dashboard.sale-invoice');
    }
}
