<?php

namespace App\Imports;

use App\SeferModel;
use App\YukModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\OnEachRow;
class SeferImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function getDbData($dbName, $where, $data){
        $db = \DB::table($dbName)->where($where,'=',$data)->first();
        if($db){
            return $db->id;
        }else {
            return 0;
        }
    }
    public function explodeD($data){
        $db = explode(' ',$data);


        $sName = array_pop($db);
        $name = implode(' ',$db);
        $name = \DB::table('drivers')->where('name','=',$name)->first();
        if($name){
        $sName = \DB::table('drivers')->where('surname','=',$sName)->first();
        if($sName->id == $name->id){
        return $sName->id;
         }}else {
            return 0;
        }
    }    public function emptyS($data){

        if(empty($data)){
            return ' ';
        }else {
            return $data;
        }
    }
    public function model(array $row)
    {

        $seferImport = new SeferModel([
            'plate_1_id'    => $this->getDbData('plate', 'plate', $row[0]),
            'plate_2_id'    => $this->getDbData('plate', 'plate', $row[1]),
            'driver_1_id'    => $this->explodeD($row[5]),
            'driver_2_id'    => $this->explodeD($row[5]),
            'note'    =>  $this->emptyS($row[3]),
            'start_date'    => date('Y-m-d'),
            'start_time'    => date('H:i'),
            'end_date'    => date('Y-m-d'),
            'end_time'    => date('H:i'),
            'user_id'    => \Auth::user()->id,
        ]);
        return $seferImport.'sefer<br>row:'.var_dump($row).'sik';
/*return new YukModel([
            'yuk_sefer_id'    => $this->getDbData('plate', 'plate', $row[2]),
            'yuk_tasima_tur_id'    => $this->getDbData('yuk_tur_listesi', 'name', $row[2]),
            'plate_2_id'    => $this->getDbData('yuk_tur_listesi', 'name', $row[2]),
            'note'    => $row[3],
            'note'    => $row[4],
            'note'    => $this->getDbData('yuk_tur_listesi', 'name', $row[5]),
        ]);*/
    }
}
