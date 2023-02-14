<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Sale;
use App\Models\SaleMaterial;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $sales = Sale::orderBy('id', 'DESC')->get();
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
        $material_ids = $this->getCacheData();
        if (!$material_ids or $material_ids === '[]'){
            return redirect()->route('materials.index')->with('danger', 'Zgjedh te pakten 1 material per shitje');
        }
        $valid = $request->validate([
            'customer_name' => 'nullable',
            'sale_date' => 'nullable',
            'customer_address' => 'nullable',
        ]);
        $valid['user_id'] = auth()->id();
        $sale = Sale::create($valid);

        $i = 0;
        $orders = [];
        $total = 0;
        foreach ($request->quantities as $quantity){
            if ($quantity and $request->prices[$i]){
                $material = Material::find($material_ids[$i]);

                $orders[$i] = ['material' => $material, 'quantity' => $quantity, 'total_price' => $request->prices[$i]*$quantity];

                $total = $total + $orders[$i]['total_price'];
                $sale->materials()->create([
                    'quantity' => $quantity,
                    'unit_price' => $request->prices[$i],
                    'unit' => $material->category->unit,
                    'amount' => $orders[$i]['total_price'],
                    'material_title' => $material->title,
                    'material_category' => $material->category->title,
                    'material_id' => $material->id,
                ]);
                $material->quantity -= $quantity;
                $material->save();
            }
            $i++;
        }
        $sale->total_amount = $total;
        $sale->update();
        cache()->clear();
        return "<script>window.open('".route('sales.invoice', $sale->id)."', '_blank')</script>";
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

    public function invoice($id)
    {
        $sale = Sale::find($id);
        return view('sales.invoice', compact('sale'));
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

    public function return(Request $request, Sale $sale)
    {
        if (!$request->material_ids){
            return redirect()->back()->with(['warning' => 'Zgjedhe të paktën një material për rikthim']);
        }
        foreach($request->material_ids as $material_id) {
            $saleMaterial = SaleMaterial::find($material_id);
            if (!$saleMaterial){
                return redirect()->back()->with(['warning' => 'Kjo Shitje nuk egziston ose është fshirë']);
            }
            $material = Material::find($saleMaterial->material_id);
            if (!$material){
                return redirect()->back()->with(['warning' => 'Ky Material nuk egziston ose është fshirë']);
            }
            $material->quantity += $saleMaterial->quantity;
            $material->save();
            $saleMaterial->delete();
        }

        if($sale->materials()->count() === 0){
             $sale->delete();
        }
        return redirect()->back()->with(['status' => 'Shitja u rikthye']);
    }
    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Sale $sale)
    {
        $sale->materials()->delete();
        $sale->delete();
        return redirect()->back()->with(['danger' => 'Shitja u fshi']);
    }
}
