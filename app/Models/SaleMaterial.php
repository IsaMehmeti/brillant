<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleMaterial extends Model
{
    use HasFactory;
    protected $fillable = ['quantity', 'unit_price', 'unit', 'amount', 'material_title', 'material_category', 'material_id', 'sale_id'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
