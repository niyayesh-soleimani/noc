<?php
namespace app\models;
use yii\data\ActiveDataProvider;
class UserSearch extends User
{
    public static function tableName()
    {
        return 'user';
    }
    public function search($params)
    {
        $query = User::find();
        if (!empty($params['UserSearch'])) {
            $this->load($params);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query, 
            'pagination' => [
            'pageSize' => 10,
            ],
        ]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'family', $this->family]);
        $query->andFilterWhere(['like', 'address', $this->address]);


        return $dataProvider;
    }
}






