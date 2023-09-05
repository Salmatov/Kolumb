<?php

namespace app\controllers;

use yii\helpers\ArrayHelper;
use yii\rest\Controller;

class RestController extends Controller
{
    public function behaviors()

    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ]);
    }
}