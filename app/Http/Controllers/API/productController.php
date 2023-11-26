<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class productController extends Controller
{
    public function index(){
        $product = product::all();
        return response()->json([
            'status'=>'success',
            'message'=>'Data Ditemukan',
            'data'=>$product,
        ]);
    }
    public function show($id){
        $product = product::find($id);
        if($product){
        return response()->json([
            'status'=>'success',
            'message'=>'Data Ditemukan',
            'data'=>$product,
        ]);
    }else{
        return response()->json([
            'status'=>'error',
            'message'=>'Data Tidak Ditemukan',
            'data'=>null,
        ], 404);
    }
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|unique:products,product_code|string|min:4|max:4',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
        ]);
        if($validate->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>'Data Tidak valid',
                'data'=>null,
            ], 422);
        }
        $product = product::create([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Data Berhasil Ditambahkan',
            'data'=>$product,
        ]);
    }
    public function update(Request $request, $id) {
        $validate = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            // 'product_code' => 'required|unique:products,product_code|string|min:4|max:4',
            'product_code' => [
                'required',
                'string',
                'min:4',
                'max:4',
                Rule::unique('products')->ignore($id),
            ],
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
        ]);
        if($validate->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>'Data Tidak valid',
                'data'=> $validate->errors(),
            ], 422);
        }
        $product = product::where('id', $id)->update([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);
        if($product){
            $product = product::find($id);
            return response()->json([
                'status'=>'success',
                'message'=>'Data Berhasil Diupdate',
                'data'=>$product,
            ]);
        }
    }
    public function destroy($id){
        $product = product::find($id);
        if(!$product){
            return response()->json([
                'status'=>'error',
                'message'=>'Data Tidak Ditemukan',
                'data'=> null,
            ], 422);
        }
        $product->delete();
        return response()->json([
            'status'=>'success',
            'message'=>'Data Berhasil Dihapus',
            'data'=> null,
        ]);

    }      
}
