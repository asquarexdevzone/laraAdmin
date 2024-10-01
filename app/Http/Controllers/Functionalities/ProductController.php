<?php

namespace App\Http\Controllers\Functionalities;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProductView()
    {
        $product = Product::all();
        return view('admin.product-master', ['products' => $product]);
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'ProductName' => 'required',
        ]);

        $productname = $request->input('ProductName');
        $slug = Str::slug($productname);

        $product = new Product;

        $product->name = $request->ProductName;
        $product->slug = $slug;

        $product->save();
        return redirect()->route('add.productview')->with('success', 'Product added successfully.');
    }

    public function deleteProduct($id)
    {
        $delete_product = DB::table('products')->where('id', $id)->delete();

        return redirect()->route('add.productview')->with('success', 'Product deleted successfully.');
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        return response()->json($product); // Return product data as JSON
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'ProductName' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->ProductName;
        $product->slug = Str::slug($request->ProductName);

        $product->save();

        return redirect()->route('add.productview')->with('success', 'Product updated successfully.');
    }

}
