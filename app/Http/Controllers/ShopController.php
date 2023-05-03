<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index($slug = null)
    {
        return view('frontend.shop.index', compact('slug'));
    }

    public function tag($slug)
    {
        return view('frontend.shop.tag', compact('slug'));
    }

    public function search(Request $request)
    {
        // Cek apakah ada request sesuai dengan yang diinginkan atau tidak
        if ($request->has('q')) {
            // Jika ada, maka simpan request tersebut ke dalam variabel $q
            $q = $request->q;
            // Lalu cari data sesuai dengan request tersebut dengan sangat spesifik
            // (mencari data yang mengandung kata yang dicari, bukan hanya kata yang mirip)
            $data = Product::where('name', 'LIKE', '%' . $q . '%')
                ->orWhere('description', 'LIKE', '%' . $q . '%')
                ->orWhere('content', 'LIKE', '%' . $q . '%')
                ->get();

        } else {
            // Jika tidak ada, maka jangan tampilkan apa-apa
            $data = [];
        }

        // Send data to the view using loadView function of PDF facade
        $products = view('frontend.search', compact('data'))->render();
    }
}
