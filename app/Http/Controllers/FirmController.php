<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $firms = Firm::all();
        return view('firms.index', compact('firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('firms.create');
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
        Firm ::create($request->all());
        return redirect()->route('firms.index')->with('status', 'U shtua me sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(Firm $firm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Firm $firm)
    {
        return view('firms.edit', compact('firm'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Firm $firm)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        $firm->update($request->all());
        return redirect()->route('firms.index')->with('status', 'U ndryshua me sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Firm $firm)
    {
        $firm->materials()->delete();
        $firm->delete();
        cache()->clear();
        return redirect()->route('firms.index')->with('danger', 'Firma u fshi');
    }
}
