<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuacaModel extends Model
{
    use HasFactory;

    protected $table = 'tb_cuaca';
    protected $fillable = [
        'id' , 'provinsi' ,'kota','keterangan' ,'suhu' ,'tanggal'
    ];
}
