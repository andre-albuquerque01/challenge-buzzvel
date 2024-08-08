<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolidayPlanRequest extends FormRequest
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
        $rules = [
            'title' => 'required|min:3|max:60|regex:/^[^<>]*$/',
            'description' => 'required|min:3|max:100|regex:/^[^<>]*$/',
            'startHoliday' => 'required|date|after_or_equal:2024-08-01',
            'endHoliday' => 'nullable|date|after_or_equal:startHoliday',
            'location' => 'required|min:3|max:60|regex:/^[^<>]*$/',
        ];

        if ($this->method() == 'PUT') {
            $rules["title"] = [
                "nullable",
                "min:3",
                "max:60",
            ];
            $rules["description"] = [
                "nullable",
                "min:3",
                "max:100",
            ];
            $rules["startHoliday"] = [
                "nullable",
                "date",
                "after_or_equal:2024-08-01",
            ];
            $rules["endHoliday"] = [
                "nullable",
                "date",
                "after_or_equal:startHoliday",
            ];
            $rules["location"] = [
                "nullable",
                "min:3",
                "max:60",
            ];
        }

        return $rules;
    }
}
