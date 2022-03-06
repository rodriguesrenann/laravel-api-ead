<?php

namespace App\Http\Requests;

use App\Models\Support;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupportRequest extends FormRequest
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
    public function rules(Support $support)
    {
        return [
            'lesson_id' => 'required|exists:lessons,id',
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:3|max:10000',
            'status' => ['required', Rule::in(array_keys($support->supportOptions))]
        ];
    }
}
