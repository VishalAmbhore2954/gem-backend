<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockMasterResource extends JsonResource
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
            'stm_item_name' => $this->stm_item_name,
            'stm_item_category' => $this->stm_item_category,
            'stm_item_subcategory' => $this->stm_item_subcategory,
            'stm_purity' => $this->stm_purity,
        ];
    }
}
