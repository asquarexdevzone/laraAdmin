<?php

namespace App\Http\Controllers\Functionalities;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function addProductView()
    {
        $product = Product::all();
        return view('admin.product',['products' => $product]);
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'ProductName' =>  'required',
            
        ]);

        $productname = $request->input('ProductName');
        $slug = Str::slug($productname);

        $product = new Product;

        $product->name = $request->ProductName;
        $product->slug = $slug;

        $product->save();
        return redirect('admin/product');
    }
}
