<?php
use app\models\Service;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'service';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'user',
                'label' => ' نام شخص',
                'value' => 'user.name'
            ],
            [
                'attribute' => 'address',
                'label' => 'آدرس',
                'value' => function ($model) {
                    return $model->address;
                }
            ],
            [
                'attribute' => 'servicetype',
                'label' => 'نوع سرویس ها',
                'value' => 'servicetype'
            ],    
            [
                'attribute' => 'pop',
                'label' => 'pop/point',
                'value' => 'pop.type'
            ],
   
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Service $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
             } 
        ],
    ],
    ]); ?>
    <p>
    <?= Html::a('Create New', ['service'], ['class' => 'btn btn-success']) ?>
</p>
</div>

