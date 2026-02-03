<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockConsolidateRequest extends FormRequest
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
            'stc_item_code' => 'integer|required|min:6',
            'stc_item_name' => 'string|reuired',
            'stc_item_category'  => 'string|reuired',
            'stc_sub_category' => 'string|reuired',
            'stc_purity' => 'numeric|reuired',
            'stc_gross_weight' => 'numeric|nullable',
            'stc_net_weight' => 'numeric|nullable',
            'stc_westage_percent' => 'numeric|nullable',
            'stc_making_charges' => 'numeric|nullable',
            'stc_rate_per_gm'  => 'numeric|nullable',
            'stc_purchase_price'  => 'numeric|nullable',
            'stc_selling_price'  => 'numeric|nullable',
            'stc_quantity'  => 'numeric|nullable',
            'stc_supplier_id'  => 'integer|nullable',
            'stc_stock_staus'  => 'string|nullable',
            'stc_firm_id'  => 'numeric|nullable',
            'stc_master_id'  => 'numeric|nullable'
        ];
    }
}
