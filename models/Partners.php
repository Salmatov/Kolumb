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


    public static function getPartnersById($id){
        return self::find()
            ->where(['id' =>$id])
            ->one();

    }


    public static function setPartner($name,$address,$phone){
        $partner = new Partners();
        $partner->name=$name;
        $partner->address=$address;
        $partner->phone=$phone;
        $partner->save();
    }


    public function deletePartner(){
        $this->delete();
    }


    public function loadDataByParams($params)
    {
        $this->name = $params['name']??$this->name;
        $this->address = $params['address']??$this->address;
        $this->phone = $params['phone']??$this->phone;
    }

}