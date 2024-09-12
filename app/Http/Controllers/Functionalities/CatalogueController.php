<?php

namespace App\Http\Controllers\functionalities;

use App\Http\Controllers\Controller;
use App\Models\catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\size_master;

class CatalogueController extends Controller
{
    public function addCatalogueView()
    {
        $products = Product::all();
        $categories = Category::all();
        $sizes = size_master::all();

        $catalogues = DB::table('catalogues')

            ->join('products', 'catalogues.product_id', '=', 'products.id')
            ->join('categories', 'catalogues.category_id', '=', 'categories.id')
            ->join('size_masters', 'catalogues.size_id', '=', 'size_masters.id')

            ->select('catalogues.*', 'products.name as product_name', 'categories.name as category_name', 'size_masters.name as size_name')->get();

        return view("admin.catalogue-master", compact("products", "categories", "sizes", "catalogues"));
    }

    public function addCatalogue(Request $request)
    {
        $catalogue = new catalogue();
        $catalogue->name = $request->catalogue_name;
        $catalogue->slug = Str::slug($request->catalogue_name);
        $catalogue->product_id = $request->product;
        $catalogue->category_id = $request->category;
        $catalogue->size_id = $request->size;
        $catalogue->catalogue_link = $request->catalogue_link;

        if ($request->hasFile('catalogue_coverpage')) {
            $file = $request->file('catalogue_coverpage');
            $filename = time() . '-' . Str::slug($request->catalogue_name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/catalogues_coverpages'), $filename);
            $catalogue->image = $filename;
        }

        if ($request->hasFile('catalogue_pdf')) {
            $pdf = $request->file('catalogue_pdf');
            $pdfFilename = time() . '-' . Str::slug($request->catalogue_name) . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('pdfs/catalogues_pdfs'), $pdfFilename);
            $catalogue->catalogue_pdf = $pdfFilename;
        }

        $catalogue->save();

        return redirect()->route('add.catalogueview')->with('success', 'Catalogue added successfully.');
    }
}