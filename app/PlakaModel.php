<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class PlakaModel extends Model
{
    use LogsActivity;

    protected $table = 'plate';
    public $timestamps = true;

    protected $fillable = [
        'company_id',
        'plate',
        'created_user_id',
        'created_at',
        'updated_at',
    ];
    protected $logAttributes = [
        'company_id',
        'plate',
        'created_user_id',
        'created_at',
        'updated_at',
    ];
    public function company()
    {
        return $this->hasOne('App\CompanyModel', 'id', 'company_id');
    }
}
