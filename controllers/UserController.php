<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\UserSearch;

class UserController extends Controller
{
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                    $searchModel = new UserSearch();
                    return $this->render('list', [
                        'dataProvider' => $searchModel->search(Yii::$app ->request ->queryParams),
                        'searchModel' => $searchModel
                ]);   
            }
        }
            return $this->render('form',['model'=>$model]);
    }
    public function actionUpdate($id)
    {
        $model = User::findOne(['id' => $id]);
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save()) {
                    return $this->redirect(['list']);
                }
            }
        return $this->render('updateBtn', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = User::findOne(['id' => $id]) -> delete();
        return $this -> redirect(['list']);
    }
    
    public function actionList()
    {
        $searchModel = new UserSearch();
        return $this->render('list', [
            'dataProvider' => $searchModel->search(Yii::$app->request->get()),
            'searchModel' => $searchModel
        ]);
    }
}