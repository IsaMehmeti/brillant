<?php

namespace App\Http\Controllers;

use App\Models\MaterialCategory;
use Illuminate\Http\Request;

class MaterialCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = MaterialCategory::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        MaterialCategory::create($request->all());
        return redirect()->route('material-categories.index')->with('status', 'U shtua me sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialCategory $materialCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(MaterialCategory $materialCategory)
    {
        return view('categories.edit', compact('materialCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, MaterialCategory $materialCategory)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        $materialCategory->update($request->all());
        return redirect()->route('material-categories.index')->with('status', 'U ndryshua me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(MaterialCategory $materialCategory)
    {
        $materialCategory->delete();
        cache()->clear();
        return redirect()->route('material-categories.index')->with('danger', 'Kategoriea u fshi');
    }
}
