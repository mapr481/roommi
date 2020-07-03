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
            'slug' => Str::slug($this->input('titulo')). '-'.rand(1000,9999)
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
        $rules = [
            'titulo' => 'required | min:3 | max:255',
            'slug' => 'required',
            'direccion' => 'required | min:3 | max:255',
            'user_id'=>'required | integer',
            'precio' => 'required | min:1 | max:999 | numeric',
            'detalles' => '',                      
            'room_type_id'=>'required | integer',
            'gender_id'=>'required | integer',
            'characteristics'=>'',
            'services'=>'',            
            'options'=>'required'
        ];
        if ($this->get('file'))
            $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png']);
        
        return $rules;
    }
}
