<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Designation */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if (Yii::$app->session->getFlash('error')):?>
<p class="alert alert-danger">
<?= Yii::$app->session->getFlash('error'); ?>
</p>
<?php endif;?>
<div class="designation-form bordered-form">
<?php 
if ($model->designation_type_id && $model->level_id)
  {
   $classname=$model->designationType->level->class_name;
   if (class_exists($classname))
   $dd=\yii\helpers\ArrayHelper::map($classname::find()->asArray()->all(),'id','name_en');
   else
     $dd=[];
  /*
  $js="

$('#dtid').trigger('click');
$("#level-id").val("'.$model->level_id.'")
";
$this->registerJs($js);
*/
    
  }
  else $dd=[];
?>
    <?php 
	   $lang=Yii::$app->language;
	   $url = \yii\helpers\Url::to(['/users/utility?at=glt&id=']);
	   $id='level-id';
	  // $users= \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(),'id','username');
	
	?>
    <?php $form = ActiveForm::begin(); ?>
    <?php $items = \yii\helpers\ArrayHelper::map(\app\modules\users\models\DesignationType::find()->asArray()->all(),'id','name_'.$lang);?>
    <div class='row'>
		<div class='col-md-6'>
	<?= $form->field($model, 'designation_type_id')->dropDownList($items,['id'=>'dtid','prompt'=>'None','onClick'=>'js:populateDropdown("'.$url.'"+$(this).val(),"'.$id.'")']) ?>
		</div>
		<div class='col-md-6'>
    <?= $form->field($model, 'level_id')->dropDownList($dd,['id'=>'level-id','prompt'=>'None']) ?>
	</div>
	</div>
	<div class='row'>
		<div class='col-md-6'>
    <?= $form->field($model, 'officer_name_hi')->textInput(['maxlength' => 100,'class'=>'hindiinput form-control']) ?>
		</div>
		<div class='col-md-6'>
    <?= $form->field($model, 'officer_name_en')->textInput(['maxlength' => 100]) ?>
	</div>
	</div>
	<div class='row'>
		<div class='col-md-4'>
    <?= $form->field($model, 'officer_mobile')->textInput(['maxlength' => 12]) ?>
		</div>
			<div class='col-md-4'>
    <?= $form->field($model, 'officer_mobile1')->textInput(['maxlength' => 12]) ?>
</div>
		
				<div class='col-md-4'>
    <?= $form->field($model, 'officer_email')->textInput(['maxlength' => 50]) ?>
	</div>
		</div>
		
    <?php
   // $form->field($model, 'officer_userid')->dropDownList($users,['maxlength' => 10])
    ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
