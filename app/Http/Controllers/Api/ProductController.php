<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use ApiResponseTrait;

    public function index(Request $request) {

        $products = Product::query()->orderBy('created_at', 'desc');
        if ($request->get('search')) {
            $products->where('name', 'like', '%'. $request->get('search') . '%');
        }

        if ($request->get('category')) {
            $products->where('category_id', $request->get('category'));
        }

        $products = $products->paginate(10);

        return $this->successResponse($products, 'products retrieved successfully.');
    }
}
