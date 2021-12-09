<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoCreateRequest extends FormRequest
{
    function attributes() {
        return [
            'nombre'  => 'nombre del departamento',
            'localizacion'    => 'localizacion del departamento',
             'id_empleado_jefe'  => 'empleado jefe'
           
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    function messages() {
  
        $max = 'El campo :attribute no puede tener más de :max caracteres.';
        $min = 'El campo :attribute no puede tener menos de :min caracteres.';
        $required = 'El campo :attribute es obligatorio.';
        $unique   = 'El campo :attribute debe ser único en la tabla de departamento.';
        
        return [
            'nombre.max'         => $max,
            'nombre.min'          => $min,
            'localizacion.max'    => $max,
            'localizacion.min'    => $min,
            'nombre.unique'       => $unique,
            'nombre.required'     => $required,
            'localizacion.required'     => $required,
            'id_empleado_jefe.unique'   => $unique,
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //'idioma'  => 'required|in:en,es',
        //'idplace' => 'nullable|exists:place,id',
        //'imagen'  => 'nullable|mimes:jpeg,png,gif,tiff,webp',
        //'name'    => 'required|min:2|max:150|unique:place,name',
        return [
             'nombre'     => 'required|min:3|max:15|unique:departamento,nombre,' . $this->id,
            'localizacion' => 'required|min:3|max:15',
            'id_empleado_jefe'   => 'unique:departamento,id_empleado_jefe,' . $this->id,
            
        ];
    }
}