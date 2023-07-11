<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Valido si el usuario del ABM del post coincide con el usuario logueado
        // if($this->usuario_id == auth()->user()->id) {
        //     return true;
        // } else {
        //     return false;
        // }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $rules = [
            'nombre' => 'required|max:255',
            //'slug' => 'required|unique:post',
            'estado' => 'required|in:1,2',
            'imagen' => 'image',
            'estado' => 'required',
            'categoria_id' => [
                'required',
                'exists:categorias,id'
            ]
        ];

        if($this->estado == 2) {
            $rules = array_merge($rules , [
                'descripcion' => 'required',
                'cuerpo' => 'required'
            ]);

        }

        return $rules;
    }

    public function messages() 
    {
        return [
            'nombre.required' => "El nombre es requerido",
            'descripcion.required' => "La descripción es requerida",
            'cuerpo.required' => "El cuerpo es requerido",
            'estado.required' => "El estado es requerido",
            'categoria_id.required' => "La categoría es requerida",
            'categoria_id.exists' => "No existe esa categoría",
            'imagen.image' => "Solo se aceptan imagenes",
        ];
    }
}
