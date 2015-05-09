<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\money\MaskMoney;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>
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

    <?php $form = ActiveForm::begin(); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-9">
	<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#basicinfo" aria-controls="basicinfo" role="tab" data-toggle="tab">Basic Info</a></li>
    <li role="presentation"><a href="#otherdetails" aria-controls="otherdetails" role="tab" data-toggle="tab">Other Details</a></li>
  </ul>
  <div class='tab-content'>
	  <div class='tab-pane active' role='tabpanel' id='basicinfo'>
		  <div class="row">
			  <div class="col-lg-2">
				 <?= $form->field($model,'division_id')->dropDownList(
                 \yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->all(),'id','name_en'),['prompt'=>'None'])?>
			  </div>
		  <div class="col-lg-3">
    <?= $form->field($model, 'work_id')->textInput(['size' => 100]) ?>
	
   	</div>
			  <div class="col-lg-6">
    <?= $form->field($model, 'name_en')->textInput(['size' => 50]) ?>
		</div>
			 
			  
		  </div>
		  <div class="row">
			  
			  
			  <div class="col-lg-4">
 <?= $form->field($model, 'work_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\WorkType::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>
		</div>
			  <div class="col-lg-4">
			  <?=$form->field($model,'scheme_id')->dropDownList(
                 \yii\helpers\ArrayHelper::map(\app\models\Scheme::find()->asArray()->all(),'id','name_en'),['prompt'=>'None'])?>
			  <span><?=Html::button('Add Scheme')?>
			  </div>
			   <div class='col-lg-3'>
			    <?= $form->field($model, 'totvalue')->textInput() ?>
	
		   </div>
		  </div>
	<div class="row">
		
		
		
		
		
		
		
		<div class="col-lg-3">
    <?= $form->field($model, 'agency')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\Agency::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>
		</div>
		<div class="col-lg-3">
			  <?= $form->field($model, 'dept_id')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\Department::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>

		</div>
		</div>
		 
	
	
	<div class="row">
		<div class="col-lg-6">
			 <?= $form->field($model, 'address')->textInput(['size' => 50]) ?>
	
		</div>
	
		<div class="col-lg-3">
			 <?= $form->field($model, 'gpslat')->textInput(['size' => 50]) ?>
	
		</div>
		<div class="col-lg-3">
			 <?= $form->field($model, 'gpslong')->textInput(['size' => 50]) ?>
	
		</div>
	</div>
		  <div class="row">
			  <?= $form->field($model, 'status')->dropDownList(\app\models\Work::status()) ?>
		  </div>
	</div>
		<div role='tabpanel' class='tab-pane' id='otherdetails'>
		<div class="row">
		<div class="col-lg-12">
			 <?= $form->field($model, 'work_admin')->widget(\app\widgets\DesignationWidget::classname()) ?>
	
		</div>
		
	


		</div>
	
			<div class="row">
		<div class="col-lg-4">
    <?= $form->field($model, 'dateofsanction')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Sanction ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
<div class="col-lg-4">
    <?= $form->field($model, 'dateoffundsreceipt')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Receipt of Funds ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
<div class="col-lg-4">
    <?= $form->field($model, 'dateofstart')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Start of Work ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
	</div>
	</div>
   
		

 
	  </div>
  


	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
		</div>
		
	</div>
	</div>
</div>
    <?php ActiveForm::end(); ?>
	<?php yii\widgets\Pjax::end() ?>

