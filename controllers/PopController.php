<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Pop;
use app\models\PopSearch;
use Yii;
class PopController extends Controller
{
    public function actionPop()
    {
        $item = [
            'pop' => 'pop', 
            'point' => 'point'
        ];
        $model = new Pop();
        if($model->load(Yii::$app->request->post()) )
        {
            $model->is_used = 0;
            $model->save();        
            Yii::$app->getSession()->setFlash('success','saved!');
            return $this->redirect(['list']);
            return $this->refresh();

        }
   
        return $this->render('form', ['model' => $model]);

    }
    public function actionList()
    {
        $searchModel = new PopSearch();
        return $this->render('list', [
            'dataProvider' => $searchModel->search(Yii::$app->request->get()),
            'searchModel' => $searchModel
            
        ]);
    }
    public function actionUpdate($id)
    {
        $model = Pop::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post())) {
            if ($model->type == 'pop') {
                $model->count = 1;
            }
            if($model->save()) {
                return $this->redirect(['list']);
            }
        }
        return $this->render('update', [
            'model' => $model
        ]);
    }
    public function actionDelete($id)
    {
        Pop::find($id)
        ->where(['id'=>$id])->one()
        ->delete();
        return $this->redirect(['list']);
    }
    public function actionView($id)
    {
    $poptype = Pop::findOne($id);
    return $this->render('view', [
        'model' => $poptype,
    ]);
    }

}