<?php

namespace App\Http\Controllers;

use App\Models\StockConsolidate;
use Illuminate\Http\Request;
use App\Services\StockConsolidateService;
use App\Http\Resources\StockConsolidateResource;
use App\Http\Requests\StoreStockConsolidateRequest;
use App\Http\Controllers\Base\BaseController;

class StockConsolidateController extends BaseController
{
    protected StockConsolidateService $stockConsolidateService;

    public function __construct(StockConsolidateService $stockConsolidateService)
    {
        $this->stockConsolidateService = $stockConsolidateService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StockConsolidate::all();

        if(!$data){
            return "Stock Consolidate data not found";
        }

        return $this->showSuccessWithData("Stock consolidate data",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockConsolidateRequest $request)
    {
        $data = $request->validated();

        $consolidate = $this->stockConsolidateService->createStockConsolidateData($data);

        if(!$consolidate){
            return "Stock consolidate data not stored";
        }

        return $this->showSuccessWithData("Stock Consolidate data stored",$consolidate);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = StockConsolidate::find($id);

        if(!$data){
            return "Stock consolidate data not found";
        }

        return $this->showSuccessWithData("Stock Consolidate data",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockConsolidate $stockConsolidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockConsolidate $stockConsolidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = StockConsolidate::find($id);

        if(!$data){
            return "Data not found!";
        }

        return  $this->showSuccessWithoutData("Stock consolidate data deleted successfully");
    }

    /**
     * Get Auto generated item code
     */
    public function itemcode()
    {
        $itemcode = $this->stockConsolidateService->getNextCode();

        return  $this->showSuccessWithData("Item Code",$itemcode);
    }
}
