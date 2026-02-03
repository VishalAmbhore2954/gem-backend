<?php

namespace App\Http\Controllers;

use App\Models\StockMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Base\BaseController;
use App\Http\Resources\StockMasterResource;
use App\Http\Requests\StockMaster\StockMasterRequest;

class StockMasterController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockMaster = StockMaster::all();

        return $this->showSuccessWithData("Stock Master Data",StockMasterResource::collection($stockMaster));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockMasterRequest $request)
    {
        $stackMasterData = StockMaster::create($request->validated());

        if(!$stackMasterData){
            return "Stock Master data not stored";
        };

        return $this->showSuccessWithData("Stock Master data stored",$stackMasterData);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $data = StockMaster::find($id);

       if (!$data) {
            return $this->showError("Stock not found", 404);
       }

       return $this->showSuccessWithData("Stock Master data is",$data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockMaster $stockMaster)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = StockMaster::find($id);

        if(!$data){
            return "Stock Master Data not found";
        }

        $data->delete();

        return $this->showSuccessWithoutData("Stock master data deleted successfully");
    }
}
