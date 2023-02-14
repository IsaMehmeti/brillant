<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Material extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'description', 'quantity', 'category_id', 'firm_id', 'color', 'code'];
    protected $with = ['category', 'firm'];

    public function category()
    {
        return $this->belongsTo(MaterialCategory::class);
    }

    public function firm()
    {
        return $this->belongsTo(Firm::class);
    }
//
//    public function shelves()
//    {
//        return $this->belongsToMany(Shelf::class)->withPivot(['quantity', 'id']);
//    }

}
