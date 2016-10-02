<?php

namespace App;

use App\Interfaces\GeneratesIngredientList;

use App\Traits\CompressesIngredientList;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements GeneratesIngredientList
{
    use Notifiable, CompressesIngredientList;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes()
    {
        return $this->hasMany( 'App\Recipe' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meals()
    {
        return $this->hasMany( 'App\Meal' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function storages()
    {
        return $this->hasMany( 'App\Storage' );
    }

    function generateIngredientList()
    {
        return $this->compressIngredientList( $this->storages->flatMap(function ($item){
            return $item->generateIngredientList();
        }) );
    }
}
