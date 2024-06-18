<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'club_id'=>'required',
            'title'=>'required|min:2',
            'type'=>'required',
        ];
    }

    public function failedValidation(ValidationValidator $validate)
    {
        throw new HttpResponseException(response([
            'success' => false,
            'message' => 'validation error',
            'data' => $validate->errors()
        ]));
    }
}
