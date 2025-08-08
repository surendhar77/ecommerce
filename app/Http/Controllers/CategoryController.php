<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // Capitalize first letter
        $name = ucfirst(strtolower($request->name));

        Category::create([
            'name' => $name,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    private function fetchProducts()
    {
        $path = public_path('api/detailedproducts.json');

        if (!File::exists($path)) {
            return collect();
        }

        $json = File::get($path);
    
        return collect(json_decode($json, true));
    }

    public function show($category)
    {
        $products = $this->fetchProducts()
            ->where('category', $category)
            ->unique('id') // ensures no duplicate product IDs
            ->values();

        $usdToInr = 83;
        return view('categories.show', compact('products', 'category', 'usdToInr'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $category->update([
            'name' => ucfirst(strtolower($request->name)),
            'description' => $request->description
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
