<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class YukModel extends Model
{
    protected $table = 'yuk_single';
    public $timestamps = true;

    protected $fillable = [
        'yuk_sefer_id',
        'yuk_tasima_tur_id',
        'yuk_ulke_id',
        'yuk_il_mernis_id',
        'yuk_ilce_mernis_id',
        'yuk_bosalt_ulke_id',
        'yuk_bosalt_il_mernis_id',
        'yuk_bosalt_ilce_mernis_id',
        'yuk_yukleme_date',
        'yuk_yukleme_time',
        'yuk_bosaltma_date',
        'yuk_bosaltma_time',
        'yuk_cins_id',
        'yuk_cins_desc',
        'yuk_tehlikeli_madde',
        'yuk_muaf_tur',
        'yuk_unId',
        'yuk_adet',
        'yuk_birim',
        'company_id',
        'alici_company_id',
        'yuk_firma_no',
        'created_at',
        'updated_at',
    ];
}
