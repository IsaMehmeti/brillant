<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $data = cache()->get('data');
        if (!$data or $data === '[]'){
            return redirect()->route('materials.index')->with('danger', 'Zgjedh te pakten 1 material per shitje');
        }
        $data = json_decode($data);
        $materials = [];
        foreach ($data as $material_id){
            array_push($materials, Material::findOrFail($material_id));
        }
        return view('sales.create', compact('materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'customer_name' => 'nullable',
            'sale_date' => 'nullable',
            'customer_address' => 'nullable',
        ]);
        $valid['user_id'] = auth()->id();
        $sale = Sale::create($valid);

        $material_ids = $this->getCacheData();
        $i = 0;
        $orders = [];
        $total = 0;
        foreach ($request->quantities as $quantity){
            if ($quantity){
                $material = Material::find($material_ids[$i]);

                $orders[$i] = ['material' => $material, 'quantity' => $quantity, 'total_price' => $material->price_per_cm*$quantity];

                $total = $total + $orders[$i]['total_price'];
                $sale->materials()->create([
                    'quantity' => $quantity,
                    'unit_price' => $material->price_per_cm,
                    'amount' => $orders[$i]['total_price'],
                    'material_title' => $material->title,
                    'material_category' => $material->category->title,
                ]);
                $material->quantity -= $quantity;
                $material->save();
            }
            $i++;
        }
        $sale->total_amount = $total;
        $sale->update();
        cache()->clear();
        return view('sales.invoice', compact('sale'));
    }

    public function add($material_id)
    {
        $data = cache()->get('data');
        $data = json_decode($data);
        if (!$data){
            $data = [];
        }
        array_push($data, $material_id);
        cache()->put('data', json_encode($data));
        return redirect()->back()->with(['status' => 'U shtua me sukses']);
    }
    public function remove($material_id)
    {
        $data = cache()->get('data');
        $data = json_decode($data);
        $key = array_search($material_id, $data, true);
        if ($key !== false) {
            unset($data[$key]);
        }
        cache()->put('data', json_encode($data));
        return redirect()->back();
    }

    public function getCacheData()
    {
        $data = cache()->get('data');
        return json_decode($data);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
