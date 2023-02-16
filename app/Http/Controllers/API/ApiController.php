<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CuacaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    //get all data cuaca

    public function index()
    {
        $cuaca = CuacaModel::all();
        return response()->json([
            'message' => 'Succes get all data',
            'data' => $cuaca
        ], Response::HTTP_OK);
    }

    //get data by id to use in react js

    public function show(Request $request, $id)
    {
        try {
            $cuacaId = CuacaModel::findOrfail($id);
            return response()->json([
                'message' => 'Succes get data by id',
                'data' => $cuacaId
            ],Response::HTTP_OK);
        } catch (ModelNotFoundException $th) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ],Response::HTTP_NOT_FOUND);
        }
    }
}
