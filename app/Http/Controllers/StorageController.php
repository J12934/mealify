<?php

namespace App\Http\Controllers;

use App\Storage;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StorageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * lists all storage units of the current user
     */
    public function index()
    {
        $user = Auth::user();

        return view('storage.index', [
           'user' => $user
        ]);
    }

    public function editIngredient($storage, $ingredient)
    {
        $storage = Storage::findOrFail($storage);
        $ingredient = $storage->ingredients()->findOrFail($ingredient);

        return view('storage.ingredient.edit', [
            'storage' => $storage,
            'ingredient' => $ingredient
        ]);
    }

    public function updateIngredient($storage, $ingredient, Request $request)
    {
        $ingredient = Storage::findOrFail($storage)
            ->ingredients()
            ->updateExistingPivot($ingredient, [ 'amount' => $request['amount']]);

        return redirect()->route( 'storage.index' );
    }
}
