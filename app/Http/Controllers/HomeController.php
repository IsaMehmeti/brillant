<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialCategory;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        $data = [];
        foreach (MaterialCategory::all() as $category){
            $data[$category->title] = 0;
                $data[$category->title] += $category->materials->sum('quantity');
        }
        return view('home')->with([
            'material_count' => DB::table('materials')->sum('quantity'),
            'sales' => Sale::latest()->take(5)->get(),
            'sale' => Sale::get('total_amount')->sum('total_amount'),
            ...$data
        ]);
    }
}
