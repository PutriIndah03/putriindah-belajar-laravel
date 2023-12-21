<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Auth::user()->role;
        $products = Product::with('category')->get();
        return view('pages.product', ['product' => $products, 'role' => $role]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $role = Auth::user()->role;

        if($role === 'admin'){
            $categories = category::all();
            return view('pages.create', ['category' => $categories]);
        }else{
            return view('pages.error');
        }

    }
    public function store(StoreproductRequest $request)
    {
        $role = Auth::user()->role;

        if($role === 'admin'){

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
        } else{
            return view('pages.error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Auth::user()->role;

        if($role === 'admin'){

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
        }else{
            return view('pages.error');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, $id)
    {
        $role = Auth::user()->role;
        if($role === 'admin'){

            $data = Product::findOrFail($id);
            $data->product_name = $request->product_name;
            $data->product_code = $request->product_code;
            $data->category_id = $request->category_id;
            $data->price = $request->price;
            $data->stock = $request->stock;
            $data->description = $request->description;
            $data->save();

            return redirect('product')->with('msg', 'produk telah diupdate');
        }else {
            return view('pages.error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Auth::user()->role;

        if($role === 'admin'){

            $data = Product::find($id);
            $data->delete();
            return redirect('product')->with('msg', 'produk telah dihapus');
        } else{
            return view('pages.error');
        }
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

