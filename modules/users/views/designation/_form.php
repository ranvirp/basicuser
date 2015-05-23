<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
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
  <div class="form-title">
    <div class="form-title-span">
        <span>Form for creating Designation</span>
    </div>
</div>
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

    <div class='row'>
		<div class='col-md-6'>
	
                        <?= $model->showForm($form,"designation_type_id") ?>

		</div>
		<div class='col-md-6'>
    
                    <?= $model->showForm($form,"level_id") ?>
	</div>
	</div>
	<div class='row'>
		<div class='col-md-6'>
    
                    <?= $model->showForm($form,"officer_name_hi") ?>
		</div>
		<div class='col-md-6'>
    
                    <?= $model->showForm($form,"officer_name_en") ?>
	</div>
	</div>
	<div class='row'>
		<div class='col-md-4'>
                    <?= $model->showForm($form,"officer_mobile") ?>
		</div>
			<div class='col-md-4'>
                   <?= $model->showForm($form,"officer_mobile1") ?>   

</div>
				<div class='col-md-4'>
                                      <?= $model->showForm($form,"officer_email") ?>
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
