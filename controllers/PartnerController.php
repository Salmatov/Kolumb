<?php

namespace app\controllers;

use app\models\Partners;
use Yii;

class PartnerController extends RestController
{



    public function actionAddPartners(){

        if (Yii::$app->request->isPost) {
            $requestData=json_decode(Yii::$app->request->getRawBody(),true);
            $name = $requestData['name'];
            $address = $requestData['address'];
            $phone = $requestData['phone'];
            Partners::setPartner($name,$address,$phone);
            return Partners::getAllPartners();
        }
    }

    public function actionAllPartners(){
            return  Partners::getAllPartners();

    }

    public function actionPartnerById($id){
        $idPartner = $id;
        return Partners::getPartnersById($idPartner);
    }

}