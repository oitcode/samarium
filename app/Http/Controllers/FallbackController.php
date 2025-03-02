<?php

namespace App\Http\Controllers;

use App\Company;
use App\Webpage;

class FallbackController extends Controller
{
    public function __invoke(string $path)
    {
        $webpage = Webpage::query()
            ->where('visibility', 'public')
            ->where('permalink', $path)
            ->firstOrFail();

        return view('website.cms.webpage')
            ->with('company', Company::first())
            ->with('webpage', $webpage);
    }
}
