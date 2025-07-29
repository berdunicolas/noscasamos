<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\File;

class UpdateSellerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'text' => ['nullable', 'string'],
            'has_banner' => ['nullable', 'string'],
            'only_logo' => ['nullable', 'string'],
            'site_link' => ['nullable', 'string'],
            'ig_link' => ['nullable', 'string'],
            'wpp_link' => ['nullable', 'string'],
            'tk_link' => ['nullable', 'string'],
            'x_link' => ['nullable', 'string'],
            'ytube_link' => ['nullable', 'string'],
            'banner_bg' => [
                'nullable',
                File::image()
                ->types(['jpeg', 'png', 'jpg'])
                ->max(2048)
            ],
            'banner_logo' => [
                'nullable',
                File::image()
                ->types(['jpeg', 'png', 'jpg'])
                ->max(2048)
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Errores de validación',
            'errors' => $validator->errors(),
            'fields' => $validator->failed()
        ], 422));
    }
}
