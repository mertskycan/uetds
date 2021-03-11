<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class SoforModel extends Model
{
    use LogsActivity;

    protected $table = 'drivers';
    public $timestamps = true;

    protected $fillable = [
        'company_id',
        'name',
        'surname',
        'email',
        'phone',
        'uyruk',
        'tc',
        'adres',
        'turKodu',
        'hesKodu',
        'active',
        'created_user_id',
        'created_at',
        'updated_at',
    ];
    protected $logAttributes = [
        'company_id',
        'name',
        'surname',
        'email',
        'phone',
        'uyruk',
        'tc',
        'adres',
        'turKodu',
        'hesKodu',
        'active',
        'created_user_id',
        'created_at',
        'updated_at',
    ];
    public function company()
    {
        return $this->hasOne('App\CompanyModel', 'id', 'company_id');
    }
}
