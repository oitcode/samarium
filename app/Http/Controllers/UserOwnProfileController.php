<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserOwnProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified',]);
    }

    /**
     * Show user's own profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.user-profile');
    }
}
