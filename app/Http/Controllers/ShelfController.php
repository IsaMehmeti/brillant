<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $shelves = Shelf::all();
        return view('shelves.index', compact('shelves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('shelves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        Shelf::create($request->all());
        return redirect()->route('shelves.index')->with('status', 'U shtua me sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function show(Shelf $shelf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Shelf $shelf)
    {
        return view('shelves.edit', compact('shelf'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Shelf $shelf)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        $shelf->update($request->all());
        return redirect()->route('shelves.index')->with('status', 'U ndryshua me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Shelf $shelf)
    {
        $shelf->materials()->detach();
        $shelf->delete();
        return redirect()->route('shelves.index')->with('danger', 'Rafti u fshi');
    }
}
