<?php

namespace App\Http\Controllers\Admin\Lot;

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
        $lots = Lot::filter($filter)->get();
        $categories = Category::all();

        return view('admin.lot.index', compact('lots', 'categories'));
    }
}
