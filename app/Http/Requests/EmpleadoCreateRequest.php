<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoCreateRequest extends FormRequest
{
    
    public function attributes() {
        return [
            'name' => 'nombre',
            'surname' => 'apellidos',
            'email' => 'correo electrónico',
            'phone' => 'teléfono',
            'datecontract' => 'fecha de contratación',
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
        $lte = 'El campo :attribute debe ser menor o igual que :value';
        $integer = 'El campo :attribute debe ser un número entero';
        $max = 'El campo :attribute no puede tener mas de :max caracteres';
        $min = 'El campo :attribute no puede tener menos de :min caracteres';
        $required = 'El campo :attribute es obligatorio';
        $unique = 'El campo :attribute debe ser único. Ya existe un empleado con ese mismo dato';
        
         return [
             'datecontract.required' => $required,
             'phone.required' => $required,
             'phone.integer' => $integer,
             'phone.gte' => $gte,
             'phone.lte' => $lte,
             'phone.unique' => $unique,
             'email.required' => $required,
             'email.min' => $min,
             'email.max' => $max,
             'email.unique' => $unique,
             'surname.required' => $required,
             'surname.min' => $min,
             'surname.max' => $max,
             'name.required' => $required,
             'name.min' => $min,
             'name.max' => $max,
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
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:100',
            'email' => 'required|min:2|max:120|unique:empleado,email',
            'phone' => 'required|integer|gte:600000000|lte:999999999|unique:empleado,phone',
            'datecontract' => 'required'
        ];
    }
}
