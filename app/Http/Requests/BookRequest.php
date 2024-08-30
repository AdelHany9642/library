<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return $this->createRules();
        }

        return $this->updateRules();
    }

    /**
     * @return array
     */
    public function createRules(): array
    {
        return [
            'name' => 'required|unique:books,name|max:255',
            'author' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function updateRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:books,name,'.$this->route('book')->getKey()],
            'author' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|string',
        ];
    }
}
