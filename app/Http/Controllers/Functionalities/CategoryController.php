<?php

namespace App\Http\Controllers\functionalities;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategoryView()
    {
        // Fetch categories along with the product names using a join
        $categories = DB::table('categories')
            ->join('products', 'categories.product_id', '=', 'products.id')
            ->select('categories.*', 'products.name as product_name')
            ->get();

        // Fetch all products for the product dropdown
        $products = Product::all();

        return view("admin.category-master", compact("products", "categories"));
    }


    public function addCategory(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'categoryname' => 'required|string|max:255',
            'product' => 'required|exists:products,id',
        ]);

        $category = new Category;
        $category->name = $request->categoryname;
        $category->product_id = $request->product;
        $category->slug = Str::slug($request->categoryname);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->categoryname) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/cat-images'), $filename);
            $category->image = $filename;
        }

        $category->save();

        // Redirect back to the form with a success message
        return redirect()->route('add.categoryview')->with('success', 'Category added successfully.');
    }

    public function deleteCategory($id)
    {
        $delete_category = DB::table('categories')->where('id', $id)->delete();

        return redirect()->route('add.categoryview')->with('success', 'Category deleted successfully.');
    }

    // Fetch category details by ID
    public function editCategory($id)
    {
        // Find the category by its ID
        $category = Category::find($id);

        // Fetch all products to populate the product dropdown
        $products = Product::all();

        // Return the category and products as JSON for the AJAX call
        return response()->json([
            'category' => $category,
            'products' => $products,
        ]);
    }


    // Update category details
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'CategoryName' => 'required',
            'Product' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->CategoryName;
        $category->product_id = $request->Product;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->categoryname) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/cat-images'), $filename);
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('add.categoryview')->with('success', 'Category Updated successfully.');
    }

}