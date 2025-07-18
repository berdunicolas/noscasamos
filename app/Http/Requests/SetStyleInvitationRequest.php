<?php

namespace App\Http\Requests;

use App\Enums\FontTypeEnum;
use App\Enums\SpacingTypeEnum;
use App\Enums\StyleTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class SetStyleInvitationRequest extends FormRequest
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
            "style" => [
                Rule::in(StyleTypeEnum::values())
            ],
            "color" => "string|max:7",
            "icon_type" => "string",
            "background_color" => "string|max:7",
            "padding" => "nullable|string",
            "font" => [
                Rule::in(FontTypeEnum::keys())
            ],
            "frame_image" => 'nullable',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Errores de validación',
            'errors' => $validator->errors()
        ], 422));
    }
}
