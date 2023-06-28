<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function page($slug)
    {
        $static_page = Page::active()->pages()->whereSlug($slug)->firstOrFail();
        if (!Cache::has('static_page')) {
            Cache::remember('static_page', 3600, function () use ($static_page) {
                return $static_page;
            });
        }

        return view('corano-dark.frontend.pages.show', compact('static_page'));
    }

    public function post($slug)
    {
        $static_page = Page::active()->posts()->whereSlug($slug)->firstOrFail();
        if (!Cache::has('static_page')) {
            Cache::remember('static_page', 3600, function () use ($static_page) {
                return $static_page;
            });
        }

        return view('corano-dark.frontend.pages.show', compact('static_page'));
    }


}
