<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleadosController extends Model
{
    use HasFactory;
    
    protected $table = 'empleado';
    
    protected $fillable = [ 'id_puesto', 'id_departamento', 'rutaImg','nombre', 'apellidos', 'email','telefono','fecha_contrato', ];
    
    public function departamento() {
        return $this->belongsTo('App\Models\departamentoController', 'id_departamento');
    }
    
    public function puesto() {
        return $this->belongsTo('App\Models\puestoController', 'id_puesto');
    }
    
    public function fotos() {
        return $this->hasMany('App\Models\ImgEmpleado', 'id_foto');
    }
    
      public function departamentos() {
        return $this->hasMany('App\Models\departamentoController', 'id_empleado_jefe');
    }
    
    
    
}
