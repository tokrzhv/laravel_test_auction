<?php

namespace App\Http\Controllers\Admin\Lot;

use App\Http\Controllers\Controller;
use App\Models\Lot;

class ShowController extends Controller
{
    public function __invoke(Lot $lot)
    {
        return view('admin.lot.show', compact('lot'));
    }
}
