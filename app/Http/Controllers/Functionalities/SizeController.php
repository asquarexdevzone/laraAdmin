<?php

namespace App\Http\Controllers\Functionalities;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\size_master;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class SizeController extends Controller
{

    public function addSizesView()
    {
        $size = size_master::all();
        return view('admin.sizes-master', ['sizes' => $size]);
    }

    public function addSizes(Request $request)
    {
        $request->validate([
            'size' => 'required',
        ]);

        $size = $request->input('size');
        $slug = Str::slug($size);

        $size = new size_master;

        $size->name = $request->size;
        $size->slug = $slug;

        $size->save();
        return redirect()->route('add.sizesview')->with('success', 'Size added successfully.');
    }

    public function editSize($id)
    {
        $size = size_master::find($id);
        return response()->json($size); // Return size_master data as JSON
    }

    public function updateSize(Request $request, $id)
    {
        $request->validate([
            'sizeName' => 'required',
        ]);

        $size = size_master::find($id);
        $size->name = $request->sizeName;
        $size->slug = Str::slug($request->sizeName);

        $size->save();

        return redirect()->route('add.sizesview')->with('success', 'Size updated successfully.');
    }

    public function deleteSizes($id)
    {
        $delete_size = DB::table('size_masters')->where('id', $id)->delete();
        return redirect()->route('add.sizesview')->with('success', 'Size deleted successfully.');
    }
}
