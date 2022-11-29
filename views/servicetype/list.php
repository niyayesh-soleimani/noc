<?php
use app\models\Pop;
use app\models\ServiceType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'servicetype';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'label' => 'شناسه',
                'value' => function ($model) {
                    return $model->id;
                }
            ],
            [
                'attribute' => 'name',
                'label' => 'نام',
                'value' => function ($model) {
                    return $model->name;
                }
            ],
            [
                'attribute' => 'count',
                'label' => 'حداکثر تعداد استفاده',
                'value' => function ($model) {
                    return $model->count;
                }
            ],
            [       
                'attribute' => 'is_used',
                'label' => '  تعداد استفاده فعلی',
                'value' => function ($model) {
                    return $model->is_used ?? '0';
              }
                
        ],
            
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, ServiceType $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
             } 
        ],
    ],
    ]); ?>
    <p>
    <?= Html::a('Create New', ['servicetype'], ['class' => 'btn btn-success']) ?>
</p>
</div>

