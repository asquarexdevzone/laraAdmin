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
        $products = Product::all();
        $categories = Category::all();
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

}