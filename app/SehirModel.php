<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SehirModel extends Model
{


    protected $table = 'il_ilce_kod';

    protected $fillable = [
        'il_kodu',
        'il',
        'ilce_kodu',
        'ilce',
    ];
}
