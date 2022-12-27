<?php

namespace App\Http\Controllers\Admin\Lot;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('admin.lot.create', compact('categories'));
    }
}
