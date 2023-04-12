<?php

namespace App\model;


use Illuminate\Database\Eloquent\Model;

class Penonton extends Model
{



    protected $table = "penontons";
    // protected $primarykey="id";
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_hp',
        'id_tiket',
        'status',


    ];
}
