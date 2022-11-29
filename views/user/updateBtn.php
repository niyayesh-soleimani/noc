
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->textInput()->hint('Please enter your name')->label('name'); ?>
<?= $form->field($model, 'family')->textInput()->hint('Please enter family')->label('family') ;?>
<?= $form->field($model, 'address')->textInput()->hint('Please enter address')->label('address') ;?>

<?= Html::submitButton('submit', ['class' => 'btn btn-primary']); 
?>
<?php $form = ActiveForm::end(); ?>