<?php
use app\models\Pop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'pop';
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
                'attribute' => 'type',
                'label' => 'آیدی',
                'value' => function ($model) {
                    return $model->id;
                },
            ],
            [
                'attribute' => 'type',
                'label' => 'نوع',
                'value' => function ($model) {
                    return $model->type;
                },
            ],
            [
                'attribute' => 'name',
                'label' => 'نام',
                'value' => function ($model) {
                    return $model->name;
                },
            ],
            [
                'attribute' => 'address',
                'label' => 'آدرس',
                'value' => function ($model) {
                    return $model->address;
                }
            ],
            [        
                'attribute' => 'count',
                'label' => 'تعداد کل ',
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
            'urlCreator' => function ($action, Pop $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
             } 
        ],
    ],
    ]); ?>
    
    <p>
    <?= Html::a('Create New', ['pop'], ['class' => 'btn btn-success']) ?>
</p>
</div>

