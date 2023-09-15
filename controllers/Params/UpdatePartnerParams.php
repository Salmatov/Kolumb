<?php

namespace app\controllers\Params;

use yii\base\Model;

class UpdatePartnerParams extends Model
{
    public $name;
    public $address;
    public $phone;

    public function rules()
    {
        return [
            [['name', 'address', 'phone'], 'string' , 'max' => 255],
        ];
    }
}