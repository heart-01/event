<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilesRequest extends FormRequest
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
            'stuId' => ['required', 'numeric', 'min:6'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'fos' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'numeric', 'min:11'],
            'lineId' => ['string', 'max:255'],
            'facebookName' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
    }
}
