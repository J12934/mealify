<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meal.index', [
            'meals' => Meal::orderBy('created_at')->paginate(6),
            'name' => 'meals'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create the Recipe and attach it to the current User
        $meal = Auth::user()->meals()->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $this->updateMealRelationships( $meal, $request);

        //Redirecting to the newly created Recipe
        return redirect()->route('meal.show', $meal->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::findOrFail($id);

        return view('meal.show', [
            'name' => $meal->name,
            'meal' => $meal
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
        $meal = Meal::findOrFail($id);
        //Redirect if the Meal does not belong to the current User
        if(!$meal->isAllowedToBeSeenBy(Auth::user())){
            return redirect()->route('explore')->withErrors( 'Unauthorized' );
        }

        return view('meal.edit', [
            'meal' => $meal
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
        $meal = Meal::findOrFail($id);

        //Redirect if the Meal does not belong to the current User
        if(!$meal->isAllowedToBeSeenBy(Auth::user())){
            return redirect()->route('explore')->withErrors( 'Unauthorized' );
        }

        $meal->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $this->updateMealRelationships( $meal, $request);

        return redirect()->route('meal.show', $meal->id);
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

    private function updateMealRelationships(Meal $meal, Request $request)
    {
        if( $request->has('recipes') ){
            //Map the Ingredients to get them into the right Format
            $recipes = collect( $request->input('recipes') )->map(function($item){
                return [
                    'title' => $item
                ];
            })->toArray();

            //Adding the Ingredients to the Recipe
            $meal->recipes()->sync($recipes);
        }
    }
}
