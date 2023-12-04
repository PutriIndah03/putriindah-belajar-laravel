<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $totalProducts = product::count();
        $totalCategories = category::count();
        $totalPrice = Product::sum('price');
        $totalStock = Product::sum('stock');

        return view('pages.dashboard', compact('totalProducts', 'totalCategories', 'totalPrice', 'totalStock'));
    }

}
