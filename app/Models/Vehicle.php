<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'model_id',
        'color_id',
        'year',
        'price',
        'mileage',
        'main_photo_url',
        'details',
    ];

    /**
     * Define a relação: Um Veículo PERTENCE A UM Modelo de Veículo.
     * Esta é a "ponte" que estava quebrada.
     */
    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class, 'model_id');
    }

    /**
     * Define a relação: Um Veículo PERTENCE A UMA Cor.
     */
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}