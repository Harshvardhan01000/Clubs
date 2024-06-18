<?php

namespace App\Http\Requests;

    use Illuminate\Contracts\Validation\Validator as ValidationValidator;
    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Http\Exceptions\HttpResponseException;

class ClubValidationRequest extends FormRequest
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
           'group_id'=>'integer|required',
        'business_name'=>'min:3|required',
        'club_number'=>'integer|required',
        'club_name'=>'min:3|required',
        'club_state'=>'required|required',
        'club_description'=>'required',
        'club_slug'=>'required',
        'website_title'=>'required',
        'website_link'=>'url|required',
        'club_logo'=>'mimes:jpeg,jpg,png,gif|max:10000|required',
        'club_banner'=>'mimes:jpeg,jpg,png,gif|max:10000|required' 
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
