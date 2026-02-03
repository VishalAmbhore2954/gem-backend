<?php

namespace App\Http\Requests\StockMaster;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockMasterRequest extends FormRequest
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
            'stm_item_name' => 'string|required',
            'stm_item_category' => 'string|required',
            'stm_item_subcategory' => 'string|required',
            'stm_purity' => 'decimal|required',
        ];
    }
}
