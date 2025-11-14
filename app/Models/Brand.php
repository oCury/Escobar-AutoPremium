<?php

namespace App\Models;

// ▼▼▼ ADICIONE ESTA LINHA ▼▼▼
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // Agora esta linha vai funcionar, pois o HasFactory foi importado
    use HasFactory;

   protected $fillable = ['name'];

    public function vehicleModels()
    {
        return $this->hasMany(VehicleModel::class, 'brand_id');
    }
}    