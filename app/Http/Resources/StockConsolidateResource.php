<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockConsolidateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'stc_item_code' => $this->stc_item_code,
            'stc_item_name' => $this->stc_item_name,
            'stc_item_category'  => $this->stc_category,
            'stc_sub_category' => $this->stc_sub_category,
            'stc_purity' => $this->stc_purity,
            'stc_gross_weight' => $this->stc_gross_weight,
            'stc_net_weight' => $this->stc_net_weight,
            'stc_westage_percent' => $this->stc_westage_percent,
            'stc_making_charges' => $this->stc_making_charges,
            'stc_rate_per_gm'  => $this->stc_rate_per_gm,
            'stc_purchase_price'  => $this->stc_purchase_price,
            'stc_selling_price'  => $this->stc_selling_price,
            'stc_quantity'  => $this->stc_quantity,
            'stc_supplier_id'  => $this->stc_supplier_id,
            'stc_stock_staus'  => $this->stc_stock_staus,
            'stc_firm_id'  => $this->stc_firm_id,
        ];
    }
}
