<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser atribuídos em massa.
     */
    protected $fillable = [
        'model_id',
        'color_id',
        'year',
        'mileage',
        'price',
        'details',
        'main_photo_url',
        'photo_url_2',
        'photo_url_3',
    ];

    /**
     * Relação: Um Veículo pertence a um Modelo.
     */
    public function model()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    /**
     * Relação: Um Veículo pertence a uma Cor.
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}