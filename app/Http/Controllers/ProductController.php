<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $products = Product::query()->orderBy('created_at', 'desc');
        if ($request->get('name')) {
            $products->where('name', 'like', '%'. $request->get('name') . '%');
        }
        $products = $products->paginate(10);
        return view('pages.dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'favorite' => 'required',
            'category_id' => 'required',
        ]);


        $this->saveToDatabase($request, new Product);


        return redirect()->route('products.index')->with('success', 'Products created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $categories = Category::all();
        return view('pages.dashboard.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'favorite' => 'required',
            'category_id' => 'required',
        ]);


        $this->saveToDatabase($request, $product);


        return redirect()->route('products.index')->with('success', 'Products updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Products deleted successfully');
    }


    private function saveToDatabase(Request $request, Product $product) {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->favorite = $request->favorite;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uuid = Str::uuid()->toString(); // Generate UUID
            $extension = $file->getClientOriginalExtension();
            $filename = $uuid . '.' . $extension;

            $file->storeAs('public/uploads', $filename);
            $product->image = $filename;
        }

        $product->save();
    }
}
