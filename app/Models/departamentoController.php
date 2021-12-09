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
    
       
    
    public function empleados() {
        return $this->hasMany ('App\Models\empleadosController', 'id_departamento');
    }
     public function jefe(){
        return $this->belongsTo ('App\Models\empleadosController', 'id_empleado_jefe');
    }
    
    //cuando tengo una dependendencia tengo dos relaciones
    
}
