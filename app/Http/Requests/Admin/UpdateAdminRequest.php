<?php

namespace App\Http\Requests\Admin;

use App\Enums\AdminTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
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

            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->admin->id)],

            'primary_admin' => ['nullable', Rule::requiredIf(in_array($this->admin->primary_admin, [AdminTypes::PRIMARY_ADMIN->value]))],

            'password' => ['nullable'],

            'role_id' => ['nullable', Rule::requiredIf(isset($this->primary_admin) && $this->primary_admin == AdminTypes::ADMIN->value), 'integer', Rule::exists('roles', 'id')],

        ];
    }
}
