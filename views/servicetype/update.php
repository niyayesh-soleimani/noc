<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\select2\Select2;

?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput()->hint('Please enter your name')->label('name');  ?>
    <?= $form->field($model, 'count')->textInput()->hint('Please enter address')->label('count') ;?>
    <?php
        echo $form->field($model, 'popPointIds')->widget(Select2::class, [
            'data' => $popPointDropDown,
            'language' => 'de',
            'options' => ['placeholder' => 'Select it ...'],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => true,
            ],
        
        ]);
    ?>
    <?= Html::submitButton('submit', ['class' => 'btn btn-primary']); ?>
<?php $form = ActiveForm::end(); ?>
