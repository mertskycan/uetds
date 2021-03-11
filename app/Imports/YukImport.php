<?php

namespace App\Imports;

use App\YukModel;
use Maatwebsite\Excel\Concerns\ToModel;

class YukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new YukModel([
            //
        ]);
    }
}
