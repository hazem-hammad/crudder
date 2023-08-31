<?php

namespace App\Http\Requests\Admin;

use App\Enums\AdminTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],

            'email' => ['required', 'email', Rule::unique('admins', 'email')],

            'primary_admin' => ['required', Rule::in([AdminTypes::ADMIN->value, AdminTypes::PRIMARY_ADMIN->value])],

            'password' => ['required', 'min:6'],

            'role_id' => ['nullable', 'required_if:primary_admin,0', 'integer', Rule::exists('roles', 'id')],

        ];
    }
}
