<?php
namespace app\controllers;
use app\models\Pop;
use app\models\PopPointServiceType;
use app\models\PopServiceType;
use app\models\ServiceType;
use app\models\ServiceTypeAdd;
use app\models\ServiceTypeSearch;
use SebastianBergmann\LinesOfCode\Counter;
use yii\web\Controller;
use Yii;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use function PHPSTORM_META\type;
// use kartik\detail\DetailView;
class ServicetypeController extends Controller
{
    public function actionServicetype()
    {
        $popPoints = Pop::find()->all();
        $popPointDropDown = [];
        foreach ($popPoints as $popPoint) { 
            $popPointDropDown[$popPoint->id] = ' ( '.$popPoint->type . ' ) ' . $popPoint->name;
        }   
        $model = new ServiceType();
        if ($model->load(Yii::$app->request->post())) {
            $model->is_used = 0;
            $model->save();
            foreach($model->popPointIds as $popPointId) {
                $popServiceType = new PopServiceType();
                $popServiceType->service_id = $model->id;
                $popServiceType->pop_id = $popPointId;
                $popServiceType->save();
            }
            return $this->redirect(['list']);
            $this->refresh();
 
        }
        return $this->render('form', [
            'popPointDropDown' => $popPointDropDown,
            'model' => $model,
        ]);
    }
    public function actionList()
    {
        $searchModel = new ServiceTypeSearch();
        return $this->render('list', [
            'dataProvider' => $searchModel->search(Yii::$app->request->get()),
            'searchModel' => $searchModel
        ]);
    }
    public function actionUpdate($id) {
        $model = ServiceType::findOne($id);
        $popPoints = Pop::find()->all();
        $popPointDropDown = [];
        foreach ($popPoints as $popPoint) { 
            $popPointDropDown[$popPoint->id] = ' ( '.$popPoint->type . ' ) ' . $popPoint->name;
        }   
        $popPointServiceTypes = PopServiceType::find()->where(['service_id' => $model->id])->all();
        $currentPoppointServicetypeIds = [];
        foreach($popPointServiceTypes as $popPointServiceType) {
            $currentPoppointServicetypeIds[] = $popPointServiceType->pop_id;
        }
        $model->popPointIds = $currentPoppointServicetypeIds;
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                foreach ($popPointServiceTypes as $popPointServiceType) {
                    $popPointServiceType->delete();
                }
                foreach($model->popPointIds as $popPointId) {
                    $popServiceType = new PopServiceType();
                    $popServiceType->service_id = $model->id;
                    $popServiceType->pop_id = $popPointId;
                    $popServiceType->save();
                } 
                return $this->redirect(['list']);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'popPointDropDown' => $popPointDropDown

        ]);
    }
    public function actionDelete($id)
    {
        ServiceType::find($id)
        ->where(['id'=>$id])->one()
        ->delete();
        $model=new PopServiceType();
        $popPointServiceTypes = PopServiceType::find()->where(['service_id' => $model->id])->all();
        foreach ($popPointServiceTypes as $popPointServiceType) {
            $model->delete();

        }

       
        

        
        
        return $this->redirect(['list']);
    }
}