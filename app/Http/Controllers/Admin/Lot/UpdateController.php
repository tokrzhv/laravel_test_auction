<?php

namespace App\Http\Controllers\Admin\Lot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lot\UpdateRequest;
use App\Models\Lot;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Lot $lot)
    {
        $data = $request->validated();

        if (isset($data['category_ids'])) $categories = $data['category_ids'];
        unset($data['category_ids']);

        $lot->update($data);
        if (isset($categories)) $lot->categories()->sync($categories);

        return view('admin.lot.show', compact('lot'));
    }
}
