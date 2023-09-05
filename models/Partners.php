<?php

namespace app\models;

use yii\db\ActiveRecord;

class Partners extends ActiveRecord
{

    public static function tableName()
    {
        return 'partners';
    }

    public static function getAllPartners(){
        return self::find()->all();
    }


    public static function setPartner($name,$address,$phone){
        $partner = new Partners();
        $partner->name=$name;
        $partner->address=$address;
        $partner->phone=$phone;
        $partner->save();
    }
}