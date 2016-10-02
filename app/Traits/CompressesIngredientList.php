<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait CompressesIngredientList
{
    public function compressIngredientList(Collection $list)
    {
        return $list->groupBy('id')
            ->map(function ($item){
                return collect([
                    'id' => $item[0]['id'],
                    'name' => $item[0]['name'],
                    'unit' => $item[0]['unit'],
                    'amount' => $item->sum('amount'),
                    'price' => $item[0]['price'],
                    'count_by' => $item[0]['count_by']
                ]) ;
            });
    }
}