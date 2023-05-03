<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Title page
        $title = 'Home';

        $products = Product::latest()->get();
        $categories = Category::whereNull('category_id')->take(4)->get();
        $slides = Slide::latest()->get();

        // Passing data to view
        return view('frontend.homepage', compact('title', 'products', 'categories', 'slides'));
    }
}
