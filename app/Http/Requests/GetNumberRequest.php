<?php

namespace App\Http\Requests;

use App\PostbackSms\Enums\TargetApiActionMethodEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetNumberRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this->mergeIfMissing(['rent_time' => null]);

        return [
            "country" => ["required", "string"],
            "service" => ["required", "string"],
            "token" => ["required", "string"],
            "rent_time" => ["nullable", "integer"],
        ];
    }
}
