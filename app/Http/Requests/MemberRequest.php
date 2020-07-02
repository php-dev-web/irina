<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MemberRequest extends FormRequest
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
        $rules = [
            'event_id' => 'required|exists:events,id',
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:members'
        ];

        if ($this->getMethod() == "PUT") {
            return [
                'email' => [
                    Rule::unique('members')->ignore($this->email, 'email')
                ]
            ] + $rules;
        }

        return $rules;
    }
}
