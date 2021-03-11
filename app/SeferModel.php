<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeferModel extends Model
{

    protected $table = 'yuk_sefer';
    public $timestamps = true;


    protected $fillable = [
        'plate_1_id',
        'plate_2_id',
        'driver_1_id',
        'driver_2_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
        'note',
        'company_transfer_no',
        'status_code',
        'sefer_id',
        'user_id',
        'created_at',
        'updated_at',
    ];
public function yukler()
{
    return $this->hasMany('App\YukModel', 'yuk_sefer_id', 'id');
}
}
