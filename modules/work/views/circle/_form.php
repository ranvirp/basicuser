<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Circle */
/* @var $form yii\widgets\ActiveForm */
?>
<span class="icon"><img src="<?=Yii::getAlias('@web')?>/icons/circle_creation.jpg"></img></span>
<div class="circle-form">
 <div class="form-title">
 	<div class="form-title-span">
 		<span>Form for creating Circle</span>
 	</div>
 </div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 200,'class'=>'hindiinput form-control']) ?>
	
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 200]) ?>
     <?= $form->field($model, 'code')->textInput(['maxlength' => 200]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
