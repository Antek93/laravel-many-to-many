<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'description' => 'required|max:300',
            'link' => 'required|max:500',
            'imagn' => 'nullable|max:4080|image',
            'category_id' => 'nullable|exists:categories,id',
            'type_id' => 'nullable|exists:types,id'
        ];
    }
}
