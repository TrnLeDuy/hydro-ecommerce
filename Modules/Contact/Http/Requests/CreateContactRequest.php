<?php

namespace Modules\Contact\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateContactRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'title' => 'required',
            'message' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10',
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
