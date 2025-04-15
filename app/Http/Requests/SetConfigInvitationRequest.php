<?php

namespace App\Http\Requests;

use App\Enums\EventTypeEnum;
use App\Enums\PlanTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class SetConfigInvitationRequest extends FormRequest
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
            "country" => "nullable|string|exists:countries,code",
            "country_division" => "nullable|string|exists:country_divisions,id",
            "path_name" => [
                "nullable",
                "string",
                Rule::unique('invitations', 'path_name')->ignore($this->route('invitation')),
            ],
            "event" => [
                Rule::in(EventTypeEnum::values())
            ],
            "plan" => [
                Rule::in(PlanTypeEnum::values())
            ],
            "active" => "boolean",

            "date" => "Date|date_format:Y-m-d",
            "time" => "nullable|date_format:H:i",
            "time_zone" => "timezone",
            "duration" => "nullable|integer|min:0",
            "meta_title" => "nullable|string|max:255",
            "meta_description" => "nullable|string|max:255",
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
