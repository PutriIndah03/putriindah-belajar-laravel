<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('pages.product', ['product' => $product]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        $validate = $request->validated();

        $data = new product;
        $data->name = $request->name;
        $data->category = $request->category;
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
        $data = Product::find($id);
        return view('pages.update')->with([
            'id' => $id,
            'name' => $data->name,
            'category' => $data->category,
            'price' => $data->price,
            'stock' => $data->stock,
            'description' => $data->description,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, $id)
    {
        $data = Product::find($id);
        $data->name = $request->name;
        $data->category = $request->category;
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
}
