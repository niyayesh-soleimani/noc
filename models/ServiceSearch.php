<?php
namespace app\models;
use yii\data\ActiveDataProvider;
class ServiceSearch extends Service
{
        public $user;
    public static function tableName()
    {
        return 'service';
    }
    public function search($params)
    {
        $query = Service::find();
        $query->joinWith(['user']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!empty($params['ServiceSearch'])) {
            $this->load($params);
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query, 
            'pagination' => [
            'pageSize' => 10,
            ],
        ]);
        $query->andFilterWhere(['like', 'address', $this->address]);
        $query->andFilterWhere(['like', 'user.name', $this->user]);


        return $dataProvider;
    }
}