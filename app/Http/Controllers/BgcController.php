<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BgcController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.bgc.quick-contacts');
    }

    /**
     * Show the quick contacts page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function quickContacts()
    {
        return view('dashboard.bgc.quick-contacts');
    }

    /**
     * Show the organizing committee page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function organizingCommittee()
    {
        return view('dashboard.bgc.organizing-committee');
    }

    /**
     * Show the organizing committee page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sponsors()
    {
        return view('dashboard.bgc.sponsors');
    }
}
