<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsGalleryController extends Controller
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
     * Show the dashboard cms gallery apge.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.cms.gallery');
    }
}
