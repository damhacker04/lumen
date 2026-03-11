<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index() {
        // Implementasi Caching (simpan data selama 60 detik)
        $products = Cache::remember('products_data', 60, function () {
            return Product::all();
        });

        return response()->json(['data' => $products], 200);
    }
}