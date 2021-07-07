<?php

namespace App\Domains\Company\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
            'bio' => 'required|string',
        ];
    }
}
