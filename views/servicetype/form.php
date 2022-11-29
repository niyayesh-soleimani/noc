<?php
    use kartik\select2\Select2;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    ?>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput()->hint('Please enter name')->label('name');  ?>
    <?= $form->field($model, 'count')->textInput()->hint('Please enter count')->label('count') ;?>
    <?php
    echo $form->field($model, 'popPointIds')->widget(Select2::class, [
        'data' =>  $popPointDropDown,
        'options' => ['placeholder' => 'Select pop / points ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true
        ],
    ]);
    ?>
    <?= Html::submitButton('submit', ['class' => 'btn btn-primary']);?>
   
    <?php $form = ActiveForm::end(); ?>


