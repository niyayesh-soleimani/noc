<?php
namespace app\models;
use yii\db\ActiveRecord;

class Service extends ActiveRecord
{
    public function rules() {
      
        return [
            [['id','user_id'], 'integer'],
            [['address','users'], 'string'],
            [['user_id','address'],'required'],
            [['poppointtype','servicetype'], 'safe'],
        ];
    }
    public function getPop()
    {
        return $this->hasOne(Pop::class, ['id' => 'poppointtype']);
    }
    public function getServicetype()
    {
        return $this->hasOne(ServiceType::className(), ['id' => 'servicetype']);
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}