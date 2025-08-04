<?php

namespace App\Http\Requests;

use App\Enums\EventTypeEnum;
use App\Enums\FontTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\StyleTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateTemplateRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                Rule::unique('templates', 'name')->ignore($this->route('template'))
            ],
            'event' => [
                'required',
                Rule::enum(EventTypeEnum::class)
            ],
            'plan' => [
                'required',
                Rule::enum(PlanTypeEnum::class)
            ],
            'duration' => 'nullable|string',
            'icon_type' => 'nullable|string',
            'style' => [
                'required',
                Rule::enum(StyleTypeEnum::class)
            ],
            'font' => [
                'required',
                Rule::enum(FontTypeEnum::class)
            ],
            'padding' => 'nullable|string',
            'color' => 'nullable|string',
            'background_color' => 'nullable|string',
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
