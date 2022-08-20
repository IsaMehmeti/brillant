<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialCategory;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = MaterialCategory::all();
        return view('materials.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => 'required',
            'price_per_cm' => 'required',
            'category_id' => 'required',
            'description' => 'nullable',
            'quantity' => 'required'
        ]);
        Material::create($valid);
        return redirect()->route('materials.index')->with('status', 'U shtua me sukses');
    }


    public function showCategory(MaterialCategory $category)
    {
        $materials = $category->materials;
        return view('materials.show', compact('category', 'materials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Material $material)
    {
        $categories = MaterialCategory::all();
        return view('materials.edit', compact(['categories', 'material']));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Material $material)
    {
        $valid = $request->validate([
            'title' => 'required',
            'price_per_cm' => 'required',
            'category_id' => 'required',
            'description' => 'nullable'
        ]);
        $material->update($valid);
        return redirect()->route('materials.index')->with('status', 'U ndryshua me sukses');
    }

    public function add(Material $material)
    {
        return view('materials.add', compact(['material']));
    }

    public function attach(Request $request, Material $material)
    {
         $valid = $request->validate([
            'quantity' => 'required',
        ]);
         $material->quantity += $request->quantity;
         $material->save();
         return redirect()->route('materials.index')->with('status', 'U shtua me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Material $material)
    {
        $material->delete();
        cache()->clear();
        return redirect()->back()->with('danger', 'Materiali u fshi');
    }
}
