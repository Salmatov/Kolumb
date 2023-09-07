<?php

namespace app\controllers;

use app\models\Partners;
use Yii;
use yii\web\Response;

class FormController extends RestController
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

    public function actionPartnerById(){
        $requestData = json_decode(Yii::$app->request->getRawBody(), true);
        $idPartner = $requestData['id'];
        return Partners::getPartnersById($idPartner);
    }


    public function actionsFindPartnerByName($nameSnippet){

    }
}