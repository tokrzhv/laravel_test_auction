<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\LotFilter;
use App\Http\Requests\Admin\Lot\StoreRequest;
use App\Http\Requests\Admin\Lot\UpdateRequest;
use App\Http\Requests\Filter\FilterRequest;
use App\Models\Category;
use App\Models\CategoryLot;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class LotController extends Controller
{
    public function index(FilterRequest $request){
        $data = $request->validated();

        $filter = app()->make(LotFilter::class, ['queryParams' => array_filter($data)]);
        $lots = Lot::filter($filter)->get();
        $categories = Category::all();

        return view('admin.lot.index', compact('lots', 'categories'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.lot.create', compact('categories'));
    }
    public function delete(Lot $lot){
        $lot->delete();
        return redirect()->route('admin.lot.index');
    }
    public function edit(Lot $lot){
        $categories = Category::all();
        return view('admin.lot.edit', compact('lot','categories'));
    }
    public function show(Lot $lot){
        return view('admin.lot.show', compact('lot'));
    }
    public function store(StoreRequest $request){
        $data = $request->validated();

        $categories = $data['category_ids'];
        unset($data['category_ids']);

        $lot = Lot::create($data);

        foreach ($categories as $category){
            CategoryLot::firstOrCreate([
                'category_id' => $category,
                'lot_id' => $lot->id,
            ]);
        }
        return redirect()->route('admin.lot.index');
    }
    public function update(UpdateRequest $request, Lot $lot){
        $data = $request->validated();

        if (isset($data['category_ids'])) $categories = $data['category_ids'];
        unset($data['category_ids']);

        $lot->update($data);
        if (isset($categories)) $lot->categories()->sync($categories);

        return view('admin.lot.show', compact('lot'));
    }
}
