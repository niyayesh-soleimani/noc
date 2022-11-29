<?php
namespace app\models;
use yii\db\ActiveRecord;
class ServiceType extends ActiveRecord
{
    public $popPointIds;
    public static function tableName()
    {
        return 'servicetype';
    }
    public function rules() {
        return [
            [['id'], 'integer'],
            [['name'], 'string'],
            [['name','count'], 'required'],
            [['count','is_used'], 'integer'],
            [['popPointIds'], 'safe'],
        ];
    }
    public function getPopServiceTypes()
    {
        return $this->hasMany(PopServiceType::class, ['service_id' => 'id']);
    }
    public function getPop()
    {
        return $this->hasMany(Pop::class, ['id' => 'pop_id'])
            ->via('popServiceTypes');
    }
    public function getService()
    {
        return $this->hasOne(Service::className(), ['servicetype' => 'id']);
    } 
}