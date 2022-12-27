<?php

namespace App\Http\Controllers\Admin\Lot;

use App\Http\Controllers\Controller;
use App\Models\Lot;

class DeleteController extends Controller
{
    public function __invoke(Lot $lot)
    {
        $lot->delete();
        return redirect()->route('admin.lot.index');
    }
}
