<?php

namespace app\controllers;

use app\controllers\Params\SetPartnerParams;
use app\models\Partners;
use Yii;
use yii\web\BadRequestHttpException;

class PartnerController extends RestController
{



    public function actionPartner(?int $id=null){

        if (Yii::$app->request->isDelete) {
            $partner = Partners::getPartnersById($id);;
            if (empty($partner)) {
                throw new BadRequestHttpException('A partner with such an ID has not been found');
            }

            $partner->deletePartner();
            return;
        }
        $requestData=json_decode(Yii::$app->request->getRawBody(),true);

        if (Yii::$app->request->isGet) {
            if (empty($id)){
                return Partners::getAllPartners();
            }
            return Partners::getPartnersById($id);
        }

        $setPartnerParams = new SetPartnerParams();
        $setPartnerParams->load($requestData,'');
        if (Yii::$app->request->isPost) {
            Partners::setPartner($setPartnerParams->name, $setPartnerParams->address, $setPartnerParams->phone);
        }elseif (Yii::$app->request->isPut){
            $partner = Partners::getPartnersById($id);;
            if (empty($partner)){
                throw new BadRequestHttpException('A partner with such an ID has not been found');
            }
            $partner->editPartner($setPartnerParams->name, $setPartnerParams->address, $setPartnerParams->phone);
        }
    }







    public function actionAddPartner(){

        if (Yii::$app->request->isPost) {
            $requestData=json_decode(Yii::$app->request->getRawBody(),true);
            $setPartnerParams = new SetPartnerParams();
            $setPartnerParams->load($requestData,'');
            Partners::setPartner($setPartnerParams->name, $setPartnerParams->address, $setPartnerParams->phone);
            return;
        }
    }

    public function actionEditPartner($id){
        if (Yii::$app->request->isPut) {
            $requestData=json_decode(Yii::$app->request->getRawBody(),true);
            $setPartnerParams = new SetPartnerParams();
            $setPartnerParams->load($requestData,'');
            $partner = Partners::getPartnersById($id);;
            if (empty($partner)){
                throw new BadRequestHttpException('Нет такого партнера.');
            }
            $partner->editPartner($setPartnerParams->name, $setPartnerParams->address, $setPartnerParams->phone);
            return ;
        }
    }


    public function actionPartnerById($id){
        $idPartner = $id;
        return Partners::getPartnersById($idPartner);
    }

    public function actionSearch()
    {
        if (Yii::$app->request->isPost) {
            $requestData = json_decode(Yii::$app->request->getRawBody(), true);
            $name = $requestData['name'];
            return Partners::find()->where(['like', 'name', $name])->all();
        }
    }


    public function actionAllPartners(){
            return  Partners::getAllPartners();
    }

    private function getPartnersBiId($id)
    {
    }
}
