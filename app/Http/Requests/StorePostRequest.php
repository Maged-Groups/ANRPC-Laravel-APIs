<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|between:20,50',
            'body' => ['required', 'min:100'],
            'post_status_id' => ['required', 'numeric', 'exists:post_statuses,id'],
        ];
    }

    public function messages () {
        return [
            'title.required' => 'لازم تكتب التايتل',
            'title.between' => 'التاتيل يتكتب ما بين 20 و 50 حرف احسن لك'
        ];
    }
}
