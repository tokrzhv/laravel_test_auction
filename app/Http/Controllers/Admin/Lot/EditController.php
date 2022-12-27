<?php

namespace App\Http\Controllers\Admin\Lot;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lot;

class EditController extends Controller
{
    public function __invoke(Lot $lot)
    {
        $categories = Category::all();
        return view('admin.lot.edit', compact('lot','categories'));
    }
}
