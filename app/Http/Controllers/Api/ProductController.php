<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {

        $products = Product::query()->orderBy('created_at', 'desc');
        if ($request->get('search')) {
            $products->where('name', 'like', '%'. $request->get('search') . '%');
        }

        if ($request->get('category')) {
            $products->where('category_id', $request->get('category'));
        }

        $products = $products->paginate(10);

        return response()->json([
            'status' => 'success',
            'message' => 'success get data products',
            'data' => $products,
        ]);
    }
}
