<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UlkeModel extends Model
{


    protected $table = 'ulkeler';

    protected $fillable = [
        'code',
        'country',
    ];
}
