<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadosUpdateRequest extends FormRequest
{
    function attributes() {
        return [
            'nombre'  => 'nombre del empleado',
            'apellidos'    => 'apellido del empleado',
            'email'      => 'email del empleado',
            'telefono'      => 'telefono del empleado',
           
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
        //$gte = 'El campo :attribute debe ser mayor o igual que :value';
        $max = 'El campo :attribute no puede tener más de :max caracteres.';
        $min = 'El campo :attribute no puede tener menos de :min caracteres.';
        $required = 'El campo :attribute es obligatorio.';
        $unique   = 'El campo :attribute debe ser único en la tabla de empleados.';
        $regex  = 'El campo :attribute no es un :attribute valido.';
        $numeric = 'El campo :attribute tiene que ser numerico.';
        return [
             'nombre.max'          => $max,
            'nombre.min'          => $min,
            'apellidos.max'          => $max,
            'apellidos.min'          => $min,
            'telefono.max'          => $max,
            'telefono.min'          => $min,
            'email.max'          => $max,
            'nombre.required'     => $required,
            'apellidos.required'     => $required,
            'email.required'     => $required,
            'telefono.required'     => $required,
            'telefono.regex'     => $regex,
            'email.unique'       => $unique,
            'email.regex'       => $regex,
            'telefono.unique'       => $unique,
            'telefono.numeric'       => $numeric,
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
             'nombre'     => 'required|min:3|max:15',
            'apellidos' => 'required|min:3|max:30',
            'email' => 'required|max:40|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:empleado,email,' . $this->id ,
            'telefono'   => 'required|numeric|unique:empleado,telefono,' . $this->id,
            
        ];
    }
}
