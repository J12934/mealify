<?php

namespace App\Http\Controllers;

use App\Recipe;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recipe.index', [
            'recipes' => Recipe::orderBy('created_at')->paginate(12),
            'name' => 'recipes'
        ]);
    }

    /*
     * Display a List of Recipes the User created
     * @return \Illuminate\Http\Response
     */
    public function indexUserRecipes(){
        $recipes = Auth::user()->recipes()->orderBy('created_at')->paginate(9);
        return view('recipe.user_recipes', [
            'recipes' => $recipes,
            'name' => 'your recipes'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create', [
            'name' => 'share a recipe'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = $request->all();

        //Map the Ingredients to get them into the right Format
        $ingredients = collect($values['ingredients'])->map(function($item){
            return [
                'amount' => $item
            ];
        })->toArray();

        //Create the Recipe and attach it to the current User
        $recipe = Auth::user()->recipes()->create([
            'name' => $values['name'],
            'image' => $values['image'],
            'description' => $values['description'],
        ]);

        //Adding the Ingredients to the Recipe
        $recipe->ingredients()->sync($ingredients);

        //Redirecting to the newly created Recipe
        return redirect()->route('recipe.show', $recipe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipe.show', [
            'name' => $recipe->name,
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        //Redirect if the Recipe does not belong to the current User
        if(!$recipe->isAllowedToBeSeenBy(Auth::user())){
            return redirect()->route('explore')->withErrors( 'Unauthorized' );
        }

        return view('recipe.edit', [
            'name' => 'edit ' . $recipe->name,
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        //Redirect if the Recipe does not belong to the current User
        if(!$recipe->isAllowedToBeSeenBy(Auth::user())){
            return redirect()->route('explore')->withErrors( 'Unauthorized' );
        }

        $values = $request->all();

        //Map the Ingredients to get them into the right Format
        $ingredients = collect($values['ingredients'])->map(function($item){
            return [
                'amount' => $item
            ];
        })->toArray();

        //Create the Recipe and attach it to the current User
        $recipe->update([
            'name' => $values['name'],
            'image' => $values['image'],
            'description' => $values['description'],
        ]);

        //Adding the Ingredients to the Recipe
        $recipe->ingredients()->sync($ingredients);

        //Redirecting to the newly created Recipe
        return redirect()->route('recipe.show', $recipe->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
