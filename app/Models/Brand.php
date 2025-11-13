<?php

namespace App\Models;

// ▼▼▼ ADICIONE ESTA LINHA ▼▼▼
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // Agora esta linha vai funcionar, pois o HasFactory foi importado
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
}