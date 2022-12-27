<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;

class Lot extends Model
{
    use Filterable;

    protected $table = 'lots';
    protected $guarded = false;

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_lots', 'lot_id', 'category_id');
    }
}
