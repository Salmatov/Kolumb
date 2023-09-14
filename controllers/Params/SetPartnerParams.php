<?php

namespace app\controllers\Params;

use yii\base\Model;

class SetPartnerParams extends Model
{
    public string $name;
    public string $address;
    public string $phone;

    public function rules()
    {
        return [
            [['name', 'address', 'phone'], 'required'],
            [['name', 'address', 'phone'], 'string' , 'max' => 255],
        ];
    }
}