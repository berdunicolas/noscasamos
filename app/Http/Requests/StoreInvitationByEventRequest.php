<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvitationByEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event' => [
                'required',
                Rule::exists('events', 'id')
            ],
            'seller' => [
                'required',
                Rule::exists('sellers', 'id')
            ],
            'path_name' => [
                'required',
                'unique:invitations,path_name'
            ]
        ];
    }

    
}
