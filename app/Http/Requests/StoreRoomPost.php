<?php

namespace App\Http\Requests;
use Illuminate\Support\Str as Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoomPost extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
            'slug' => Str::slug($this->input('titulo'))
        ]);
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'slug' => '',
            'direccion' => 'required',
            'user_id'=>'',
            'precio' => 'required',
            'detalles' => '',
            'internet' => '',
            'cable' => '',
            'telefono' => '',
            'visitas' =>'',
            'vehiculos' => '',
            'mascotas' => '',
            'cocina' => '',
            'baño' => '',
            'cuarto' =>'',
            'especificacion'=>'',
            'type_room_id'=>'',
            'gender_id'=>'',
        ];
    }
}
