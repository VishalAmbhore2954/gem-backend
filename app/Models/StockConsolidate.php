<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockConsolidate extends Model
{
    /** @use HasFactory<\Database\Factories\StockConsolidateFactory> */
    use HasFactory;

    protected $guarded = ['id'];
}
