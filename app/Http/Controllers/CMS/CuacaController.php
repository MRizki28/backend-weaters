<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\CuacaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CuacaController extends Controller
{

    public function index()
    {
        $cuaca = CuacaModel::all();
        return view('Admin.cuaca')->with('cuaca', $cuaca);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'provinsi' => 'required',
                'kota' => 'required',
                'keterangan' => 'required',
                'suhu' => 'required|numeric',
                'tanggal' => 'required|date'
            ],
            [
                'required' => 'Data tidak boleh kosong'
            ]
        );

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            toastr()->error('Gagal', $message);
            return redirect()->back();
        }

        try {
            $data = new CuacaModel();
            $data->provinsi = $request->provinsi;
            $data->kota = $request->kota;
            $data->keterangan = $request->keterangan;
            $data->suhu = $request->suhu;
            $data->tanggal = $request->tanggal;
            $data->save();  
        } catch (\Throwable $th) {
            toastr()->error('Gagal', $th);
            return redirect()->back();  
        }

        if ($data) {
            toastr()->success('Data has been saved successfully!');
            return redirect('cuaca');
        } else {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            return redirect()->back();
        }
    }
}
