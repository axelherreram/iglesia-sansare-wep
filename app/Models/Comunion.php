<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunion extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'comunion';

    // Campos que pueden ser rellenados mediante un array
    protected $fillable = [
        'NoPartida',
        'folio',
        'fecha_comunion',
        'nombre_persona_participe',
        'nombre_padre',
        'nombre_madre',
        'fecha_nacimiento',
        'nombre_persona_comuion',
        'dato_parroquia_id',
        'departamento_id',
        'municipio_id',
    ];

    // Relación con la tabla `dato_general_parroquia`
    public function parroquia()
    {
        return $this->belongsTo(DatoGeneralParroquia::class, 'dato_parroquia_id', 'dato_parroquia_id');
    }

    // Relación con la tabla `departamento`
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'departamento_id');
    }

    // Relación con la tabla `municipio`
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'municipio_id');
    }
}