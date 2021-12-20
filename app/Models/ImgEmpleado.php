<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgEmpleado extends Model
{
   
    use HasFactory;
    
    protected $table = 'imgEmpleado';
    
    protected $fillable = ['nombreArchivo', 'nombreImagen', 'mimeType', 'id_empleado' ];
    
    public function empleados() {
        return $this->hasMany('App\Models\empleadosController' , 'id_empleado');
    }
    
    
    

}
