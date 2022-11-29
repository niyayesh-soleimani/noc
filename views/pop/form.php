<?php
    use kartik\select2\Select2;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use richardfan\widget\JSRegister;
    ?>
    <?php $form = ActiveForm::begin(); ?>
    <?php
    $item = [
        'pop' => 'pop', 
        'point' => 'point'
    ];
    echo $form->field($model, 'type')->widget(Select2::classname(), [
        'data' => $item,
        'language' => 'de',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
    <?= $form->field($model, 'name')->textInput()->hint('Please enter your name')->label('Name');  ?>
    <?= $form->field($model, 'address')->textInput()->hint('Please enter address')->label('Address') ;?>
    <?= $form->field($model, 'count')->textInput()->hint('Please enter count')->label('Count') ;?>
    <?= Html::submitButton('submit', ['class' => 'btn btn-primary']); 
    ?>
    <?php $form = ActiveForm::end(); ?>
<?php JSRegister::begin(); ?>
    <script>
        $("#pop-type").change(function () {
            console.log($("#pop-type").val());
            if($("#pop-type").val() == 'pop') {
                $('.field-pop-count').hide();
                $('#pop-count').val(1);
            } else {
                $('.field-pop-count').show();
                $('#pop-count').val('');
            }
        });
    </script>
<?php JSRegister::end(); ?>



