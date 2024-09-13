<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'contacto_id',
        'calle',
        'ciudad',
        'estado',
        'codigo_postal',
        'pais',
    ];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
