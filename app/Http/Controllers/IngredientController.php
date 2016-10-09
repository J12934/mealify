<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

use App\Http\Requests;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::orderBy('updated_at')->paginate(24);

        return view('ingredients.index', [
            'ingredients' => $ingredients
        ]);
    }

    public function update(Request $request, $id)
    {
        Ingredient::findOrFail($id)->update($request->all());

        return redirect()->route('ingredient.index');
    }

    public function create(Request $request)
    {
        Ingredient::create($request->all());

        return redirect()->route('ingredient.index');
    }
}
