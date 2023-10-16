<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocadorCreateRequest extends FormRequest
{
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
            'dni' => ['required', 'string', 'unique:locadors,dni'],
            'codigo' => ['required', 'string', 'unique:locadors,codigo'],
            'celular' => ['required'],
            
          ];
    }
    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            if($validator->errors()->count()) {
                if(!in_array($this->method(), ['PUT', 'PATCH'])) {
                    $validator->errors()->add('post', true);
                }
            }
        });
    
    }
}
