<?php

namespace App\Http\Controllers;
use CodeDredd\Soap\Facades\Soap;
use CodeDredd\Soap\Client\Response;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
       $response =  Soap::baseWsdl('https://servis.turkiye.gov.tr/services/g2g/kdgm/test/uetdsesya?wsdl')
       ->withBasicAuth('999999', '999999testtest')
       ->yeniSeferEkleV3([
        'wsuser' => [
            'kullaniciAdi' => '999999',
            'sifre' => '999999testtest',
        ],
        'seferBilgileriInput' => [
            'plaka1' => '06TEST123',
            'plaka2' => '34TEST123',
            'sofor1TCNo' => '11111111111',
            'sofor2TCNo' => '22222222222',
            'baslangicTarihi' => date('d/m/Y'),
            'baslangicSaati' => date('H:i'),
            'bitisTarihi' => '01/01/2021',
            'bitisSaati' => date('H:i'),
            'firmaSeferNo' => 'Tesdsdfsfsdfsd',
        ],
        ])
        ->throw()
        ->json();

    return $response;
}
public function ref(){
   $response =  Soap::baseWsdl('https://servis.turkiye.gov.tr/services/g2g/kdgm/test/uetdsesya?wsdl')
   ->withBasicAuth('999999', '999999testtest')
   ->servisTest([
    'testMsj' => 'Tesdsdfsfsdfsd',
    ])
    ->throw()
    ->json();

return $response;
}
}
