<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalRequest;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        return response()->json($animals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AnimalRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {
        $animal = new Animal();
        $animal->fill($request->all());
        $animal->save();
        return response()->json($animal, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return response()->json($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AnimalRequest $request
     * @param  \App\Models\Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalRequest $request, Animal $animal)
    {
        $animal->fill($request->all());
        $animal->save();
        return response()->json($animal, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Animal::destroy($id);
        return response()->noContent();
    }
}
