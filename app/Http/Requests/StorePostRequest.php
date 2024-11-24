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
                'user_id' => 'required|exists:users,id', 
                'name' => 'required|string|max:100',
                'description' => 'nullable|string|max:255',
                'category' => 'required|string|max:100',
                'rating' => 'nullable|integer|min:1|max:5',
                'clicks' => 'nullable|integer|min:0',
                'image' => 'nullable|url|max:2048',
                'price' => 'required|integer|min:0', 
                'currency' => 'required|string|size:3',
        ];
    }
}
