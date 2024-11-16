<?php

namespace App\Core\Product\Request;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'sku' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }

    /**
     * @return float
     */
    public function price(): float
    {
        return $this->float('price');
    }

    /**
     * @return int
     */
    public function quantity(): int
    {
        return $this->integer('quantity');
    }

    /**
     * @return string
     */
    public function sku(): string
    {
        return $this->string('sku');
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->string('description');
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->string('name');
    }
}
