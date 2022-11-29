<?php
namespace app\models;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
class PopServiceType extends ActiveRecord
{
    public static function tableName()
    {
        return 'pop_servicetype';
    }
    public function rules()
    {
        return [
            [['id', 'pop_id', 'service_id'], 'integer'],
        ];
    }
    public function getPop()
    {
        return $this->hasOne(Pop::class, ['id' => 'pop_id']);
    }
    public function getServiceType()
    {
        return $this->hasOne(ServiceType::class, ['id' => 'service_id']);
    }
}
