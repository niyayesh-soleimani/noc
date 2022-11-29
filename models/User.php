<?php
namespace app\models;
use yii\db\ActiveRecord;
class User extends ActiveRecord
{
    public $userId;
    public function rules()
    {
        return [
            [['name', 'family' , 'address'], 'required'],
        ];
    }

}