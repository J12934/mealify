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

    public function create()
    {
        return view('storage.create', [
            'name' => 'new storage'
        ]);
    }

    public function store(Request $request)
    {
        //Map the Ingredients to get them into the right Format
        $ingredients = collect($request->ingredients)->map(function($item){
            return [
                'amount' => $item
            ];
        })->toArray();

        $storage = Auth::user()->storages()->create([
            'name' => $request->name
        ]);

        $storage->ingredients()->sync($ingredients);

        return redirect()->route( 'storage.index' );
    }

    public function edit($storage)
    {
        $storage = Storage::findOrFail($storage);

        return view('storage.edit', [
            'name' => 'edit storage',
            'storage' => $storage
        ]);
    }

    public function update($storage, Request $request)
    {
        $storage = Storage::findOrFail($storage);
        $storage->name = $request->name;
        $storage->save();

        //Map the Ingredients to get them into the right Format
        $ingredients = collect($request->ingredients)->map(function($item){
            return [
                'amount' => $item
            ];
        })->toArray();

        $storage->ingredients()->sync($ingredients);

        return redirect()->route( 'storage.edit', $storage->id );
    }
}
