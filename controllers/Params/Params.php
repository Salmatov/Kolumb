<?php

namespace app\controllers\Params;

class Params
{
    public static function get($data,$class){

        if (is_string($data)){
            $data = json_decode($data,'true');


        }
        $params = new $class();
        $params->load($data, '');
        return $params;
    }
}