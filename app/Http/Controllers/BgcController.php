<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BgcController extends Controller
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
     * Show the dashboard bgc view.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('dashboard.bgc.quick-contacts');
    }

    /**
     * Show the quick contacts page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function quickContacts(): View
    {
        return view('dashboard.bgc.quick-contacts');
    }

    /**
     * Show the organizing committee page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function organizingCommittee(): View
    {
        return view('dashboard.bgc.organizing-committee');
    }

    /**
     * Show the organizing committee page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sponsors(): View
    {
        return view('dashboard.bgc.sponsors');
    }
}
