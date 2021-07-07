<?php

namespace App\Domains\Company\Http\Requests;

use App\Domains\Company\Models;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreCompanyRequest.
 */
class StoreCompanyRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'website' => ['required'],
            'logo' => ['required'],
            'bio' => ['required'],
        ];

        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'bio' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'roles.*.exists' => __('One or more roles were not found or are not allowed to be associated with this user type.'),
            'permissions.*.exists' => __('One or more permissions were not found or are not allowed to be associated with this user type.'),
        ];
    }
}
