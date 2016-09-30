<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'unit',
        'price',
        'count_by'
    ];

    public function getActualPriceAttribute()
    {
        return $this->pivot != null ?
            ($this->pivot->amount / $this->count_by) * $this->price :
            'No Pivot!';
    }
}
