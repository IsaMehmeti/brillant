<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'quantity', 'price_per_cm', 'category_id'];
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(MaterialCategory::class);
    }
//
//    public function shelves()
//    {
//        return $this->belongsToMany(Shelf::class)->withPivot(['quantity', 'id']);
//    }
}
