<?php

namespace App\Services;

use App\Models\StockMaster;
use App\Models\StockConsolidate;
use Carbon\Carbon;

class StockConsolidateService{
    public function createStockConsolidateData(array $data){
        $master = StockMaster::where('stm_item_name', $data['stc_item_name'])
            ->where('stm_item_category', $data['stc_item_category'])
            ->where('stm_item_subcategory', $data['stc_sub_category'])
            ->where('stm_purity', $data['stc_purity'])
            ->first();

        // 2. If not exists, create new master
        if (!$master) {
            $master = StockMaster::create([
                'stm_item_name' => $data['stc_item_name'],
                'stm_item_category' => $data['stc_item_category'],
                'stm_item_subcategory' => $data['stc_sub_category'],
                'stm_purity' => $data['stc_purity'],
                'stm_user_id' => $data['stc_user_id'],
                'stm_firm_id' => $data['stc_firm_id'],
            ]);
        }

        // 3. Create stock consolidate record
        $consolidate = StockConsolidate::create([
            'stc_item_code'       => $data['stc_item_code'],
            'stc_item_name'       => $data['stc_item_name'],
            'stc_item_category'   => $data['stc_item_category'],
            'stc_sub_category'    => $data['stc_sub_category'],
            'stc_purity'          => $data['stc_purity'],
            'stc_gross_weight'    => $data['stc_gross_weight'] ?? null,
            'stc_net_weight'      => $data['stc_net_weight'] ?? null,
            'stc_westage_percent' => $data['stc_westage_percent'] ?? null,
            'stc_making_charges'  => $data['stc_making_charges'] ?? null,
            'stc_rate_per_gm'     => $data['stc_rate_per_gm'] ?? null,
            'stc_purchase_price'  => $data['stc_purchase_price'] ?? null,
            'stc_selling_price'   => $data['stc_selling_price'] ?? null,
            'stc_quantity'        => $data['stc_quantity'] ?? null,
            'stc_supplier_id'     => $data['stc_supplier_id'] ?? null,
            'stc_stock_staus'     => $data['stc_stock_staus'] ?? null,
            'stc_firm_id'         => $data['stc_firm_id'] ?? null,
            'stc_master_id'       => $master->id ?? null,
            'stc_user_id'         => $data['stc_user_id'] ?? null,
        ]);

        return $consolidate;
    }


    public function getNextCode()
    {
        // Get the latest item code
        $lastCode = StockConsolidate::orderBy('id', 'desc')
            ->value('stc_item_code');

        if (!$lastCode) {
            // No records yet
            return 'ITEM00001';
        }

        // Extract numeric part (ITEM00001 -> 00001)
        $number = (int) substr($lastCode, 4);

        // Increment
        $nextNumber = $number + 1;

        // Generate next code
        return 'ITEM' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    }


    public function totalStock()
    {
        $now = Carbon::now();
        $lastMonth = $now->copy()->subMonth();

        // Current month total
        $currentTotal = StockConsolidate::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('stc_purchase_price');

        // Previous month total
        $previousTotal = StockConsolidate::whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->sum('stc_purchase_price');

        // Percentage calculation
        if ($previousTotal > 0) {
            $percentageChange = (($currentTotal - $previousTotal) / $previousTotal) * 100;
        } else {
            $percentageChange = 0;
        }

        return response()->json([
            'current_month_total'  => $currentTotal,
            'previous_month_total' => $previousTotal,
            'percentage_change'    => round($percentageChange, 2)
        ]);
    }
}
