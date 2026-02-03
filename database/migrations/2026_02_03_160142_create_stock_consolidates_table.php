<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_consolidates', function (Blueprint $table) {
            $table->id();
            $table->string('stc_item_code');
            $table->string('stc_item_name');
            $table->string('stc_item_category');
            $table->string('stc_sub_category');
            $table->string('stc_purity');
            $table->string('stc_gross_weight');
            $table->string('stc_net_weight');
            $table->string('stc_westage_percent');
            $table->string('stc_making_charges');
            $table->string('stc_rate_per_gm');
            $table->string('stc_purchase_price');
            $table->string('stc_selling_price');
            $table->string('stc_quantity');
            $table->string('stc_supplier_id');
            $table->string('stc_stock_staus');
            $table->string('stc_firm_id');
            $table->string('stc_master_id');
            $table->string('stc_user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_consolidates');
    }
};
