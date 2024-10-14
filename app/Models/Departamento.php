<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'departamento';

    // Clave primaria de la tabla
    protected $primaryKey = 'departamento_id';

    // Desactivar timestamps si no los necesitas
    public $timestamps = false;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'depto',
    ];

    // Relación con la tabla Municipio
    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'departamento_id', 'departamento_id');
    }
}
