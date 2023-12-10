<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'section_name' => 'required|string|unique:sections|min:4',
            'description' => 'string|min:3',
        ];
    }

    public function messages()
    {
        return[
            'section_name.required' => 'حقل الإسم مطلوب',
            'section_name.string' => 'من فضلك أدخل نص',
            'section_name.unique' => 'هذا الإسم موجود مسبقا',
            'section_name.min' => 'أدخل نص أكبر من 3 حروف',
            'description.string' => 'من فضلك أدخل نص',
            'description.min' => 'أدخل نص أكبر من 3 حروف',
        ];
    }
}
