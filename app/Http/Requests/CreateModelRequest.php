<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateModelRequest extends FormRequest
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
        $segments       = request()->segments();
        $modelName      = ucfirst($segments[1]);
        $model          = "App\\Models\\" . $modelName;
        $modelObj       = new $model;
        
        return $modelObj::$rules;
    }
}
