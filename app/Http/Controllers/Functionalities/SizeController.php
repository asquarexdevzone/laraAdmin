<?php

namespace App\Http\Controllers\Functionalities;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\size_master;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    
    public function addSizesView()
    {
        $size = size_master::all();
        return view('admin.sizes-master',['sizes'  => $size]);
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
}
