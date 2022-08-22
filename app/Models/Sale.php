<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name', 'customer_address', 'sale_date', 'user_id', 'comment', 'total_amount'];
    protected $with = ['materials'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materials()
    {
        return $this->hasMany(SaleMaterial::class);
    }
}
