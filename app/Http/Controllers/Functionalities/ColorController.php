<?php

namespace App\Http\Controllers\Functionalities;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function addColorView()
    {
        return view ('admin.color-master');
    }
}
