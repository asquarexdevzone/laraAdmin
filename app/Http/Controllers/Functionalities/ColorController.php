<?php

namespace App\Http\Controllers\Functionalities;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ColorController extends Controller
{
    public function addColorView()
    {
        $color = color::all();
        return view('admin.color-master', ['colors' => $color]);
    }

    public function addColor(Request $request)
    {
        $request->validate([
            'ColorName' => 'required',
        ]);

        $colorname = $request->input('ColorName');
        $slug = Str::slug($colorname);

        $color = new color;

        $color->name = $request->ColorName;
        $color->slug = $slug;

        $color->save();
        return redirect()->route('add.colorview')->with('success', 'Color added successfully.');
    }

    public function editColor($id)
    {
        $color = color::find($id);
        return response()->json($color); // Return color data as JSON
    }

    public function updateColor(Request $request, $id)
    {
        $request->validate([
            'ColorName' => 'required',
        ]);

        $color = color::find($id);
        $color->name = $request->ColorName;
        $color->slug = Str::slug($request->ColorName);

        $color->save();

        return redirect()->route('add.colorview')->with('success', 'Color updated successfully.');
    }

    public function deleteColor($id)
    {
        $delete_color = DB::table('colors')->where('id', $id)->delete();

        return redirect()->route('add.colorview')->with('success', 'Color deleted successfully.');
    }
}