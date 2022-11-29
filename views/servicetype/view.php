<?php

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
       
        [
            'attributes'=>'name',
            'label' => 'name',
            'value' =>function ( $model) {
                return $model->name;
            }
        ],
        [
            'attributes'=>'count',
            'label' => 'count',
            'value' =>function ( $model) {
                return $model->count;
            }
        ],   
        [
            'attributes'=>'point',
            'label' => 'point',
            'format'=>'raw',
            'value'=>$typename ,

        ]
    ],

]);

?>
