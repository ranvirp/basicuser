<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
 .work-form
 {
	 font-size:60%;
	 line-height:60%;
 }
</style>
<?php
 
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_matreq").on("pjax:end", function() {
            $.pjax.reload({container:"#matreqs"});  //Reload GridView
        });
    });'
);
?>

<div class="mat-req-form">
<?php yii\widgets\Pjax::begin(['id' => 'new_matreq']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>
	<div class="row">
		<div class="col-lg-12">
 <?= $form->field($model, 'material_type')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\MaterialType::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>
		</div>
		
		<div class="col-lg-12">
		 <?= $form->field($model, 'qty')->textInput() ?>
		</div>
		
		
	<div class="col-lg-12">
   
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success test' : 'btn btn-primary test',
			//'onClick'=>'$(".work-form").parent().append($(".work-form").clone());return false;'
			]) ?>
    </div>
	</div>
	
   
    <?php ActiveForm::end(); ?>
		<?php yii\widgets\Pjax::end() ?>

</div>
