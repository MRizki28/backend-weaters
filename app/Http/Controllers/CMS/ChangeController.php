<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\CuacaModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ChangeController extends Controller
{

    public function index2(){
        $cuaca = CuacaModel::all();
        return view('Admin.cuaca')->with('cuaca', $cuaca);
    }

    public function index()
    {
        $datas = CuacaModel::all();
    
        $decryptedDatas = [];
        foreach($datas as $data) {
            $decryptedId = $data->id;
            if(strpos($decryptedId, ':') !== false){
                $decryptedId = Crypt::decrypt($decryptedId);
            }
            $decryptedDatas[] = [
                'id' => $decryptedId,
                'created_at' => $data->created_at,
                'other_data' => $data
            ];
        }
    
        return response()->json([
            'message' => 'Success Get All Data',
            'data' => $decryptedDatas
        ], Response::HTTP_OK);
    }
    
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'provinsi' => 'required',
            'kota' => 'required',
            'keterangan' => 'required',
            'suhu' => 'required|numeric',
            'tanggal' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Gagal, periksa kembali form anda',
                'errors' => $validator->errors(), 
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    
        $validated = $validator->validated();
        $data = CuacaModel::create($validated);
        $encrypted_id = Crypt::encrypt($data->id);
    
        return redirect('/cuaca')->with([
            'message' => 'Berhasil menambahkan data',
            'data' => [
                'id' =>  $encrypted_id,
                'created_at' => $data->created_at,
                'other_data' => $validated
            ]
        ]);
    }
    
    

    public function getById(Request $request, $id)
    {

        $data = CuacaModel::findOrfail($id);

        return response()->json([
            'message' => 'Data success get ',
            'data' => [
                'id' => $data->id,
                'created_at' => $data->created_at,
                'other_data' => $data
            ]
            ],Response::HTTP_OK);
    }

    
}
