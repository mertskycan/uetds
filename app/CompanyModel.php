<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class CompanyModel extends Model
{

    use LogsActivity;
    protected $table = 'company';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'vergidairesi',
        'vergino',
        'adres',
        'telefon1',
        'telefon2',
        'eposta',
        'uetdskullaniciadi',
        'uetdssifre',
        'SMTP_host',
        'SMTP_Username',
        'SMTP_Password',
        'SMTP_Secure',
        'SMPT_Port',
        'SMTP_From',
        'SMTP_Fromname',
        'SMTP_setFrom',
        'created_user_id',
        'company_user_id',
        'created_at',
        'updated_at',
    ];
    protected static $logAttributes = [
        'name',
        'vergidairesi',
        'vergino',
        'adres',
        'telefon1',
        'telefon2',
        'eposta',
        'uetdskullaniciadi',
        'uetdssifre',
        'SMTP_host',
        'SMTP_Username',
        'SMTP_Password',
        'SMTP_Secure',
        'SMPT_Port',
        'SMTP_From',
        'SMTP_Fromname',
        'SMTP_setFrom',
        'created_user_id',
        'company_user_id',
        'created_at',
        'updated_at',
    ];

   public function user()
   {
       return $this->hasOne('App\User', 'id', 'company_user_id');
   }
}
