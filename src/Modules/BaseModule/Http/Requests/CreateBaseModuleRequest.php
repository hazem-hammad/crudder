<?php

namespace App\Modules\BaseModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBaseModuleRequest extends FormRequest
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
        $rules = [];

        $rules['name_ar'] = ['required', 'string'];
        $rules['name_en'] = ['required', 'string'];
        $rules['status'] = ['required', 'boolean'];

        return $rules;
    }
}
