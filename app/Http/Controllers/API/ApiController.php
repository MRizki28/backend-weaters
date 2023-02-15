<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CuacaModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function index()
    {
        $cuaca = CuacaModel::all();
        return response()->json([
            'message' => 'Success Tampilkan Data',
            'data' => $cuaca
        ],Response::HTTP_OK);
    }
}
