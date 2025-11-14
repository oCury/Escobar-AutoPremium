<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicle_models'; // Garante que o nome da tabela está correto

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand_id',
        'name',
    ];

    /**
     * Define a relação: Um Modelo de Veículo PERTENCE A UMA Marca.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * Define a relação: Um Modelo de Veículo PODE TER VÁRIOS Veículos.
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'model_id');
    }
}