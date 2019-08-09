<?php

namespace App\Http\Controllers;

use App\News;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('base', ['page' => Page::where('title', 'about')->first()]);
    }

    public function contact()
    {
        return view('base', ['page' => Page::where('title', 'contact')->first()]);
    }

    public function news()
    {
        return view('news', ['news' => News::orderBy('created_at', 'desc')->paginate(3)]);
    }

    public function privacyPolicy()
    {
        return view('base', ['page' => Page::where('title', 'privacy policy')->first()]);
    }

    public function terms()
    {
        return view('base', ['page' => Page::where('path', 'terms-conditions')->first()]);
    }
}
