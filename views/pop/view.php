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
            'attributes'=>'address',
            'label' => 'address',
            'value' =>function ( $model) {
                return $model->address;
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
            'label' => 'pop/point',
            'format'=>'raw',
            'value' =>function ( $model) {
                return $model->type;
            }

        ]
    ],

]);

?>
