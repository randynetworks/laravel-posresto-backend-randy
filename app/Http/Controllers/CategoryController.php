<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::query()->orderBy('created_at', 'desc');
        if ($request->get('name')) {
            $categories->where('name', 'like', '%'. $request->get('name') . '%');
        }
        $categories = $categories->paginate(10);
        return view('pages.dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uuid = Str::uuid()->toString(); // Generate UUID
            $extension = $file->getClientOriginalExtension();
            $filename = $uuid . '.' . $extension;

            $file->storeAs('public/uploads', $filename);
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);

        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uuid = Str::uuid()->toString(); // Generate UUID
            $extension = $file->getClientOriginalExtension();
            $filename = $uuid . '.' . $extension;

            $file->storeAs('public/uploads', $filename);
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
