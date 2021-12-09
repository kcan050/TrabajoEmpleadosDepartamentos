<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puestoController extends Model
{
    use HasFactory;
    
    protected $table = 'puesto';
    
    protected $fillable = ['id_puesto','nombre', 'minimo', 'maximo',];
    
    protected $attributes = ['minimo' => 0,'maximo' => 0,];
    
    public function empleados () {
        return $this->hasMany ('App\Models\empleadosController', 'id_puesto');
    }
}
