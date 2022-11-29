<?php

namespace app\models;
use yii\db\ActiveRecord;

use function PHPSTORM_META\type;

class Pop extends ActiveRecord
{
    public $service_id;
    public static function tableName()
    {
        return 'pop';
    }
    public function rules()
    {
        return [
            [['name', 'address','type'], 'string'],
            [['name', 'address','type'], 'required'],
         [['count', 'is_used'], 'integer'],
         [['count'], 'required'],
         [['service_id'],'integer']
        ];
    }
    public function getPopServiceTypes()
    {
        return $this->hasMany(PopServiceType::class, ['pop_id' => 'id']);
    }
    public function getServiceTypes()
    {
        return $this->hasMany(ServiceType::class, ['id' => 'service_id'])
            ->via('popServiceTypes');
    }   
    public function getService()
    {
        return $this->hasOne(Service::class, ['servicetype' => 'id']);
    }  
    public function beforeSave($insert)
    {
        if ($this->isNewRecord && $this->count<1) {
            $this->count =1;
        }
        return parent::beforeSave($insert);
    }
    // public function beforeSave2($insert)
    // {
    //     if ($this->isNewRecord && $this->is_used<1) {
    //         $this->is_used = 0;
    //     }
    //     return parent::beforeSave2($insert);
    // }
}