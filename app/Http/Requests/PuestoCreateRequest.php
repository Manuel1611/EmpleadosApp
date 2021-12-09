<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuestoCreateRequest extends FormRequest
{
    
    public function attributes() {
        return [
            'name' => 'nombre',
            'minsal' => 'salario mínimo',
            'maxsal' => 'salario máximo',
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

    public function messages() {
        $gte = 'El campo :attribute debe ser mayor o igual que :value';
        $integer = 'El campo :attribute debe ser un número entero';
        $max = 'El campo :attribute no puede tener mas de :max caracteres';
        $min = 'El campo :attribute no puede tener menos de :min caracteres';
        $required = 'El campo :attribute es obligatorio';
        $unique = 'El campo :attribute debe ser único. Ya existe un puesto con ese :attribute';
        
         return [
             'minsal.required' => $required,
             'minsal.integer' => $integer,
             'minsal.gte' => $gte,
             'maxsal.required' => $required,
             'maxsal.integer' => $integer,
             'maxsal.gte' => $gte,
             'name.required' => $required,
             'name.min' => $min,
             'name.max' => $max,
             'name.unique' => $unique,
         ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100|unique:puesto,name',
            'minsal' => 'required|integer|gte:965',
            'maxsal' => 'required|integer|gte:965'
        ];
    }
}
