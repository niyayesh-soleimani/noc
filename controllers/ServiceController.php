<?php
namespace app\controllers;
use app\models\Pop;
use app\models\PopServiceType;
use yii\web\Controller;
use app\models\Service;
use app\models\ServiceSearch;
use app\models\ServiceType;
use app\models\User;
use Yii;
use yii\helpers\ArrayHelper;

class ServiceController extends Controller
{
    public function actionService()
    {
        $rows = Pop::find()->all(); 
        $PopDropDown = [];
        if(count($rows)>0){
            foreach($rows as $row){
                $PopDropDown[$row->id] = $row->name ;
            }
        }
        $rows = ServiceType::find()->all(); 
        $serviceTypesDropDown = [];
        if(count($rows)>0){
            foreach($rows as $row){
                if ( $row->is_used < $row->count) {
                    $serviceTypesDropDown[$row->id] = $row->name ;
                }   
                
            }
        }
        $users = User::find()->all();
        $userDropDown=[];
        if(count($users)>0){
            foreach ($users as $user) {
                $userDropDown[$user->id] = $user->name;
            }
        }
        $model = new Service();
        $pop = new Pop();
        if($model->load(Yii::$app->request->post()) )
        {
            $model->save();    
            $serviceType = ServiceType::find()->where(["id" => $model->servicetype])->one(); 
            $serviceType->is_used += 1;
            $pop = Pop::find()->where(["id" => $model->poppointtype])->one(); 
            $pop->is_used += 1;
            $pop->save();
            $serviceType->save();
            Yii::$app->getSession()->setFlash('success','saved!');
            return $this->redirect(['list']);
        }
        return $this->render('form', [
            'model' => $model,
            'PopDropDown' => $PopDropDown,
            'userDropDown' => $userDropDown ,
            'serviceTypesDropDown' => $serviceTypesDropDown,
        ]);
    }
    public function actionList()
    {
        $searchModel = new ServiceSearch();
        return $this->render('list', [
            'dataProvider' => $searchModel->search(Yii::$app->request->get()),
            'searchModel' => $searchModel
        ]);
    }
    public function actionUpdate($id)
    {
        $userDropDown=[];
        $users = User::find()->all();
        foreach ($users as $user) {
            $userDropDown[$user->id] = $user->name;
        }
        $rows = ServiceType::find()->all(); 
        $serviceTypesDropDown = [];
        if(count($rows)>0){
            foreach($rows as $row){
                if ( $row->is_used < $row->count) {
                    $serviceTypesDropDown[$row->id] = $row->name ;
                }   
                
            }
        }
        $model = Service::findOne(['id' => $id]);
        $PopDropDown = [];
        $pops = PopServiceType::find()->where(['service_id' => $model->servicetype])->all();
        $pops=ArrayHelper::getColumn($pops,'pop_id');
        $poppoints=Pop::find()->where(['in', 'id', $pops])->all();
        $PopDropDown = ArrayHelper::map($poppoints,'id','name');  

        $serviceType = ServiceType::find()->where(["id" => $model->servicetype])->one(); 
        // if($serviceType->is_used <=0){
        //     return $serviceType->is_used = 0;
        // }
        $serviceType->is_used -= 1;
        $pop = Pop::find()->where(["id" => $model->poppointtype])->one();
        // if($pop->is_used <=0){
        //     return $pop->is_used = 0;
        // } 
        $pop->is_used -= 1;
        if($model->load(Yii::$app->request->post()))
        {
            // $model = Service::findOne(['id' => $id]);
            // $model->save()

             $model2 = Service::findOne(['id' => $id]);
             $model2->is_used -=1;
            $model2->save();

             $model2 = pop::findOne(['id' => $id]);
             $model2->is_used -=1;
             $model2->save();

            $serviceType = ServiceType::find()->where(["id" => $model->servicetype])->one(); 
            $serviceType->is_used += 1;

            $pop = Pop::find()->where(["id" => $model->poppointtype])->one(); 
            $pop->is_used += 1;

            $pop->save();

            $serviceType->save();
           if($model->save()) {
                return $this->redirect(['list']);
           }
        }
        return $this->render('update', [
            'model' => $model,
            'userDropDown'=>$userDropDown,
            'serviceTypesDropDown' => $serviceTypesDropDown,
            'PopDropDown' => $PopDropDown,
        ]);
    }
    public function actionDelete($id)
    {
        Service::find($id)
        ->where(['id'=>$id])->one()
        ->delete();
        return $this->redirect(['list']);
    }
    public function actionView($id)
    {
    $poptype = Service::findOne($id);
    return $this->render('view', [
        'model' => $poptype,
    ]);
    }

}