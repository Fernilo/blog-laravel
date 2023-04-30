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
            'nombre' => 'required',
            //'slug' => 'required|unique:post',
            'estado' => 'required|in:1,2'
        ];

        if($this->estado == 2) {
            $rules = array_merge($rules , [
                'categoria_id' => 'required',
                'etiquetas' => 'required',
                'descripcion' => 'required',
                'cuerpo' => 'required'
            ]);
        }

        return $rules;
    }
}
