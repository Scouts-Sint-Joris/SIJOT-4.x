<?php

namespace Sijot\Http\Requests\Backend\Articles;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class: Store Validator 
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Requests\Backend\Articles
 */
class StoreValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'status' => 'required', 
            'titel' => 'required', 
            'bericht' => 'required'
        ];
    }
}
