<?php

namespace app\controllers;

use app\controllers\Params\Params;
use app\controllers\Params\SetPartnerParams;
use app\controllers\Params\UpdatePartnerParams;
use app\models\Partners;
use Yii;
use yii\web\BadRequestHttpException;

class PartnerController extends RestController
{


    public function actionAdd(){
        if (!Yii::$app->request->isPost) {
            throw new BadRequestHttpException();
        }
        $params = Params::get(Yii::$app->request->getRawBody(),SetPartnerParams::class);
        $params->validate();
        Partners::setPartner($params->name, $params->address, $params->phone);
    }


    public function actionUpdate($id){
        if (!Yii::$app->request->isPut) {
            throw new BadRequestHttpException();
        }
        $params = Params::get(Yii::$app->request->getRawBody(),UpdatePartnerParams::class);
        $params->validate();
        $partner = Partners::getPartnersById($id);
        if (empty($partner)){
            throw new BadRequestHttpException('A partner with such an ID has not been found');
        }
        $partner->loadDataByParams($params->toArray());
        $partner->save();
    }


    public function actionGet(int $id){

        if (!Yii::$app->request->isGet) {
            throw new BadRequestHttpException();
        }
        $idPartner = $id;
        return Partners::getPartnersById($idPartner);
    }


    public function actionSearch(string $name)
    {
        if (!Yii::$app->request->isGet) {
            throw new BadRequestHttpException();
        }
        return Partners::find()->where(['like', 'name', $name])->all();
    }


    public function actionList(){
        if (!Yii::$app->request->isGet) {
            throw new BadRequestHttpException();
        }
        return  Partners::getAllPartners();
    }


    public function actionDelete($id)
    {
        if (!Yii::$app->request->isDelete) {
            throw new BadRequestHttpException();
        }
        $partner = Partners::getPartnersById($id);;
        if (empty($partner)) {
            throw new BadRequestHttpException('A partner with such an ID has not been found');
        }
        $partner->deletePartner();
    }
}
