<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class departamentoController extends Model
{
    use HasFactory;
    
    
    protected $table = 'departamento';
    
    protected $fillable = ['nombre', 'localizacion', 'id_empleado_jefe'];
    
       
    
    public function empleados () {
        return $this->hasMany ('App\Models\empleadosController', 'id_empleado_jefe');
    }
    
    
    
    
}
