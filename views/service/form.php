<?php
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use richardfan\widget\JSRegister;

    ?>
    <?php $form = ActiveForm::begin(); ?>
    <?php
        echo $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => $userDropDown,
        'options' => ['placeholder' => 'select the userName ...'],
        'pluginOptions' => [
        'allowClear' => true,
        ],
        ]);
    ?>
    <?= $form->field($model, 'address')->textInput()->hint('enter the address ....')->label('Address') ;?>
    <?= $form->field($model, 'servicetype')->dropDownList($serviceTypesDropDown, ['id'=>'servicetype']);?>
    <?= $form->field($model, 'poppointtype')->dropDownList([], ['id'=>'poppointtype']);?>
    <?= Html::submitButton('submit', ['class' => 'btn btn-primary']); ?>
    <?php $form = ActiveForm::end(); ?>
    <?php JSRegister::begin(); ?>
    <script>
            $(document).ready(function(){
            $.ajax({
                type: 'POST', 
                url: '/site/test',  
                data:{servicetypeId:$("#servicetype").val()},    
                success: function (data)
                {
                    $('#poppointtype').children().remove().end()
                    $.each(data, function( index, value ) {
                        $("#poppointtype").append(
                            '<option value="'+index+'">'+value+'</option>'
                        );
                    });
                }
            });     
        });
        $("#servicetype").change(function () {
            $.ajax({
                type: 'POST', 
                url: '/site/test',  
                data:{servicetypeId:$("#servicetype").val()},    
                success: function (data)
                {
                    $('#poppointtype').children().remove().end()
                    $.each(data, function( index, value ) {
                        $("#poppointtype").append(
                            '<option value="'+index+'">'+value+'</option>'
                        );
                    });
                }
            });     
        });
    </script>
<?php JSRegister::end(); ?>





