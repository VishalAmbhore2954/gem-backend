<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function showSuccessWithData(string $message,$data){
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ],200);
    }

    public function showSuccessWithoutData(string $message){
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }
}
