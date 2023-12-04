<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('pages.product', ['product' => $products]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $categories = category::all();
        return view('pages.create', ['category' => $categories]);
    }
    public function store(StoreproductRequest $request)
    {
        $validate = $request->validated();

        $data = new product;
        $data->product_name = $request->product_name;
        $data->product_code = $request->product_code;
        $data->category_id = $request->category_id;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->description = $request->description;
        $data->save();

        return redirect('product')->with('msg', 'produk telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Product::with('category')->findOrFail($id);
        $categories = Category::all();

        return view('pages.update')->with([
            'id' => $id,
            'product_name' => $data->product_name,
            'product_code' => $data->product_code,
            'category_id' => $data->category->id, // Gunakan id kategori daripada category_name
            'price' => $data->price,
            'stock' => $data->stock,
            'description' => $data->description,
            'categories' => $categories,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, $id)
    {
        $data = Product::findOrFail($id);
        $data->product_name = $request->product_name;
        $data->product_code = $request->product_code;
        $data->category_id = $request->category_id;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->description = $request->description;
        $data->save();

        return redirect('product')->with('msg', 'produk telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect('product')->with('msg', 'produk telah dihapus');
    }
    public function chart()
    {
        $productCategories = DB::table('products')
        ->select('category_id', DB::raw('count(*) AS total_products'), DB::raw('SUM(price) AS total_price'),
        DB::raw('SUM(stock) AS total_stock'))
        ->groupBy('category_id')
        ->get();

    $categories = $productCategories->pluck('category_id')->toArray();
    $totalProducts = $productCategories->pluck('total_products')->toArray();
    $totalPrice = $productCategories->pluck('total_price')->toArray();
    $totalStock = $productCategories->pluck('total_stock')->toArray();

    return view('pages.chart', compact('categories', 'totalProducts', 'totalPrice', 'totalStock'));
    }

}

