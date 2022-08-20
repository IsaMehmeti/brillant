<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleMaterial extends Model
{
    use HasFactory;
    protected $fillable = ['quantity', 'unit_price', 'amount', 'material_title', 'material_category', 'sale_id'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
