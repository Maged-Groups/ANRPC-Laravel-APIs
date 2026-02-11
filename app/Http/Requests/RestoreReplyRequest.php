<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestoreReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user_roles = explode(',', auth()->user()->roles);

        $has_role = in_array('restore-reply', $user_roles);

        return $has_role;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reply_ids' => 'required|array',
            'reply_ids.*' => 'integer|exists:replies,id'
        ];
    }
}
