<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Filters\LotFilter;
use App\Http\Requests\Filter\FilterRequest;
use App\Models\Category;
use App\Models\Lot;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(LotFilter::class, ['queryParams' => array_filter($data)]);
        $categories = Category::all();
        $lots = Lot::filter($filter)->get();

        return view('main.index', compact('lots', 'categories'));
    }
}
