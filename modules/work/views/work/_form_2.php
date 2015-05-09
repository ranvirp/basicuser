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
        $("#new_work").on("pjax:end", function() {
            $.pjax.reload({container:"#works"});  //Reload GridView
        });
    });'
);
?>

<div class="work-form">
<?php yii\widgets\Pjax::begin(['id' => 'new_work']) ?>
    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>
	<div class="row">
		<div class="col-lg-4 small">
			<?=$form->field($model,'division_id')->widget(\app\widgets\DivisionWidget::classname())?>
		</div>
		
		<div class="col-lg-2">

    <?= $form->field($model, 'name_en')->textInput(['size' => 50]) ?>
		</div>
		
		<div class="col-lg-2">
 <?= $form->field($model, 'work_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\WorkType::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>
		</div>
		
		<div class="col-lg-2">
		 <?= $form->field($model, 'totvalue')->widget(MaskMoney::classname()) ?>
		</div>
		
	
   
	<div class="col-lg-1">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success test' : 'btn btn-primary test',
			//'onClick'=>'$(".work-form").parent().append($(".work-form").clone());return false;'
			]) ?>
    </div>
	</div>
   
    <?php ActiveForm::end(); ?>
		<?php yii\widgets\Pjax::end() ?>

</div>
