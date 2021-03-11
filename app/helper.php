<?php

function checkEmpty($data){
    if (is_null($data) || !$data || empty($data) || isset($data)) {
        return 0;
    } else {
        return $data;
    }

}
function getModelData($modelName, $modelId, $modelColumn){

        $model_name = 'App\\'.$modelName;
        $model = $model_name::find($modelId);
        if($model){
        return $model->$modelColumn;
        }else {
            return '';
        }

}

function getDbData($dbName, $dbId, $dbColumn){

    $db = \DB::table($dbName)->where('id','=',$dbId)->first();
    if($db){
    return $db->$dbColumn;
    }else {
        return '';
    }

}

function selected($data, $value){
    if($data == $value){
        return 'selected';
    }
}

