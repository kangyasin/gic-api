<?php

namespace App\Http\Requests\Contact;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    /**
     * @var Validator
     */
    public $validator = null;

    /**
     * for return response message from custom request
     *
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
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
        $contactId = $this->route()->parameter('id');

        return [
            'name' => 'required|string',
            'phone'=> 'required|string|unique:contacts,phone,'.$contactId.',id',
            'email' => 'required|email|unique:contacts,email,'.$contactId.',id'
        ];
    }
}
