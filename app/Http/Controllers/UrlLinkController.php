<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlLinkController extends Controller
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
     * Show the appointment component.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('url-link.dashboard.url-link');
    }
}
