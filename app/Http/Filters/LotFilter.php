<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class LotFilter extends AbstractFilter
{
    public const CATEGORY_ID = 'category_id';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY_ID => [$this, 'categories'],
        ];
    }

    public function categories(Builder $builder, $value)
    {
        $builder->whereHas('categories', function ($b) use ($value) {
            $b->whereIn('category_id', $value);
        });
    }
}
