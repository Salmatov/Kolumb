<?php

namespace app\controllers;

use app\models\Partners;
use Yii;

class FormController extends RestController
{



    public function actionAdd(){
        if (Yii::$app->request->isPost) {
            return $this->request;
        }
    }
    public function actionAllPartners(){
            return  Partners::getAllPartners();

    }

    public function actionSetMenu(){
        return 'test';
    }
}