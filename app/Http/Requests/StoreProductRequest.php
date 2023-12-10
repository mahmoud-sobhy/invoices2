<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name' => 'required|string|unique:products|min:4',
            'description' => 'string|min:3',
        ];
    }

    public function messages()
    {
        return[
            'product_name.required' => 'حقل الإسم مطلوب',
            'product_name.string' => 'من فضلك أدخل نص',
            'product_name.unique' => 'هذا الإسم موجود مسبقا',
            'product_name.min' => 'أدخل نص أكبر من 3 حروف',
            'description.string' => 'من فضلك أدخل نص',
            'description.min' => 'أدخل نص أكبر من 3 حروف',
        ];
    }
}
