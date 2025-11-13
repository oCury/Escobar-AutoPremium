<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand_id'];

    // Define a relação: Um Modelo (VehicleModel) pertence a uma Marca (Brand)
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}