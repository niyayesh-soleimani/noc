<?php
namespace app\models;
use yii\data\ActiveDataProvider;
class PopSearch extends Pop
{
    public static function tableName()
    {
        return 'pop';
    }
    public function search($params)
    {
        $query = Pop::find();
        if (!empty($params['PopSearch'])) {
            $this->load($params);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query, 
            'pagination' => [
            'pageSize' => 10,
            ],
        ]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'type', $this->type]);
        $query->andFilterWhere(['like', 'address', $this->address]);


        return $dataProvider;
    }
}






