<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducInstitutionController extends Controller
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
     * Show the institution component.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.institution');
    }
}
