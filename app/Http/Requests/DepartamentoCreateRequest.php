<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoCreateRequest extends FormRequest
{
    
    public function attributes() {
        return [
            'name' => 'nombre',
            'location' => 'localización',
            'idempleadojefe' => 'empleado jefe',
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
        $max = 'El campo :attribute no puede tener mas de :max caracteres';
        $min = 'El campo :attribute no puede tener menos de :min caracteres';
        $required = 'El campo :attribute es obligatorio';
        $unique = 'El campo :attribute debe ser único. Ya existe un departamento con ese :attribute';
        
         return [
             'location.required' => $required,
             'location.min' => $min,
             'location.max' => $max,
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
            'name' => 'required|min:2|max:100|unique:departamento,name',
            'location' => 'required|min:2|max:100',
            'idempleadojefe' => ''
        ];
    }
}
