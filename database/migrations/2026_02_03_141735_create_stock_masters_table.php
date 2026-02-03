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
        Schema::create('stock_masters', function (Blueprint $table) {
            $table->id();
            $table->string('stm_item_name');
            $table->string('stm_item_category');
            $table->string('stm_item_subcategory');
            $table->string('stm_purity');
            $table->string('stm_user_id');
            $table->string('stm_firm_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_masters');
    }
};
