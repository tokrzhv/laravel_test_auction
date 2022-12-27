<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lot;


class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['lotsCount'] = Lot::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        return view('admin.main.index', compact('data'));
    }
}
