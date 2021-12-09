<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuestoCreateRequest extends FormRequest
{
    function attributes() {
        return [
            'nombre'  => 'nombre del puesto',
            'minimo'    => 'minimo sueldo del puesto',
            'maximo'  => 'maximo sueldo del puesto'
           
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
        $gte = 'El campo :attribute debe ser mayor o igual que :value';
        $lte = 'El campo :attribute debe ser menor o igual que :value';
        $required = 'El campo :attribute es obligatorio.';
        $numeric = 'El campo :attribute debe ser numérico';
        
        return [
            'nombre.max'          => $max,
            'nombre.min'          => $min,
            'minimo.gte'          => $gte,
            'minimo.lte'          => $lte,
            'maximo.gte'          => $gte,
            'maximo.lte'          => $lte,
            'nombre.required'     => $required,
            'minimo.required'     => $required,
            'maximo.required'     => $required,
            'minimo.numeric'     => $numeric,
            'maximo.numeric'     => $numeric,
            
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
            'nombre'     => 'required|min:3|max:30',
            'minimo' => 'required|numeric|gte:900|lte:12000',
            'maximo'   => 'required|numeric|gte:900|lte:12000',
            
        ];
    }
}
