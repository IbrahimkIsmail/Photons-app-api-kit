<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'kitchen_id' => 'required',
            'category_id' => 'required',
            'occasion_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'main_image' => '',
            'cooking_time' => 'required',
            'number_of_people' => 'required',
            'ingredients' => '',
            'prepares' => '',
            'status' => '',
            'featured' => '',
            'deep_link' => '',
        ];
    }
}
