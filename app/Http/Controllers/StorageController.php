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
            'name' => 'your storage',
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $storage = Auth::user()->storages()->create([
            'name' => $request->name
        ]);

        return redirect()->route( 'storage.index' );
    }

    public function update($storage, Request $request)
    {
        $storage = Storage::findOrFail($storage);

        //Map the Ingredients to get them into the right Format
        $ingredients = collect($request->ingredients)->map(function($item){
            return [
                'amount' => $item
            ];
        })->toArray();

        $storage->ingredients()->sync($ingredients);

        return redirect()->route( 'storage.index' );
    }
}
