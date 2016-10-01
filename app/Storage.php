<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'name'
    ];

    public function ingredients()
    {
        return $this->belongsToMany( 'App\Ingredient' )->withPivot( 'amount' );
    }
}
