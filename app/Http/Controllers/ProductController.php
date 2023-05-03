<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with('media', 'category', 'tags')
            ->where('slug', $slug)
            ->withCount('media','approvedReviews')
            ->withAvg('approvedReviews', 'rating')
            ->active()
            ->hasQuantity()
            ->firstOrFail();

        $relatedProducts = Product::with('firstMedia')->whereHas('category', function ($query) use ($product) {
            $query->whereId($product->category_id);
        })
            ->where('id', '<>', $product->id)
            ->inRandomOrder()
            ->active()
            ->hasQuantity()
            ->take(4)
            ->get(['id', 'slug', 'name', 'price']);

        return view('frontend.product.show', compact('product', 'relatedProducts'));
    }

    public function cari(Request $request)
    {
        // Ambil data yang dikirim dari form
        $cari = $request->q;

        // Cari data
        $products = Product::where('name', 'like', "%" . $cari . "%")->paginate(10);

        // Kita passing data ke view
        return view('frontend.search', ['products' => $products]);
    }


}
