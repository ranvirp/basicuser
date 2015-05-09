<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;
use kartik\widgets\DatePicker;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\WorkProgress */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
Modal::begin([
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => 'click me'],
]);
?>
<div class="work-progress-form">

    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-inline']]); ?>
	

  <?=Html::activeHiddenInput($model,'work_id')?>
	
    <?= $form->field($model, 'physical')->textInput(['size'=>3]) ?>
	
	
	
    <?= $form->field($model, 'financial')->textInput(['size'=>3]) ?>
	
    <?= $form->field($model, 'dateofprogress')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Progress...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	
    <?= $form->field($model, 'remarks')->textarea(['rows' => 2,'cols'=>3]) ?>
	
    <div class="form-group">
        <?= Html::submitButton('Create' , ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php Modal::end();?>