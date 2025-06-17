<?php

namespace App\Http\Requests;

use App\Enums\PlanTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvitationRequest extends FormRequest
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
            'name' => 'required|string|unique:events,name',
            'event' => 'required|string',
            'plan' => [
                Rule::enum(PlanTypeEnum::class)
            ],
            'seller' => [
                'required',
                Rule::exists('sellers', 'id')
            ],
        ];
    }
}
