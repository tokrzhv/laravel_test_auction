<?php

namespace App\Http\Controllers\Admin\Lot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lot\StoreRequest;
use App\Models\CategoryLot;
use App\Models\Lot;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
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
}
