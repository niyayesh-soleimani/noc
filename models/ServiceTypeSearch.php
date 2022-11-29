<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class ServiceTypeSearch extends ServiceType
{
    public function search($params)
    {
        $query = ServiceType::find();
        if (!empty($params['ServiceTypeSearch'])) {
            $this->load($params);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,  
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
    
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'count', $this->count]);
        return $dataProvider;
    
    }
}

