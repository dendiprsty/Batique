<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $order_success = Order::where('status', 'completed')->count();
        $order_cancel = Order::where('status', 'cancelled')->count();
        $order = Order::count();

        // Ambil semua Data Kategori yang ada di Tabel Categories
        $categories = Category::all();

        // Inisialisasi variabel array untuk menyimpan jumlah produk per kategori
        $product_count_by_category = [];

        // Looping untuk mengisi variabel array
        foreach ($categories as $category) {
            $product_count_by_category[] = Product::getProductCountByCategory($category->id);
        }

        // Load view dashboard.blade.php dari folder (resources/views/admin)
        return view('admin.dashboard', compact('product_count', 'order_success', 'order_cancel', 'order', 'product_count_by_category', 'categories'));
    }
}
