<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        return view('products.create', compact('stores'));
        // return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'store_id' => 'required|exists:stores,store_name',
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'product_price' => 'required|numeric|min:0'
        ]);
        // 
        $store = Store::where('store_name', $request->store_id)->first();
        // 
        Product::create([
            'store_id' => $store->id,
            'product_name' => $validated['product_name'],
            'product_description' => $validated['product_description'],
            'product_price' => $validated['product_price']
        ]);
        return redirect()->route('products.index')
        ->with('success', 'Add Product Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
       // return view('products.edit', compact('product'));
       $stores = Store::all();
       return view('products.edit', compact('product', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'store_id' => 'required|exists:stores,store_name',
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'product_price' => 'required|numeric|min:0'
        ]);
    
        $store = Store::where('store_name', $request->store_id)->first();
        
        $product->update([
            'store_id' => $store->id,
            'product_name' => $validated['product_name'],
            'product_description' => $validated['product_description'],
            'product_price' => $validated['product_price']
        ]);
    
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
