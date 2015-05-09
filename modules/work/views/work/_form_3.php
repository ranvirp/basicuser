<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>
<h3>Work Entry Form </h3>
<div class="work-form">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>
	
	
 <?= $form->field($model, 'work_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\WorkType::find()->asArray()->all(),'id','name_'.Yii::$app->language),
	 ['prompt'=>'None','onChange'=>'this.form.submit()']) ?>
			  <?=$form->field($model,'scheme_id')->dropDownList(
                 \yii\helpers\ArrayHelper::map(\app\models\Scheme::find()->asArray()->all(),'id','name_en'),['prompt'=>'None'])?>
			
				 <?= $form->field($model,'division_id')->dropDownList(
                 \yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->all(),'id','name_en'),['prompt'=>'None'])?>
			 
	<?= $form->field($model, 'work_id')->textInput(['size' => 100]) ?>
	
   	<?= $form->field($model, 'name_en')->textInput(['size' => 50]) ?>
			    <?= $form->field($model, 'totvalue')->textInput() ?>
	
		<?php
		$work=Yii::$app->request->post('Work');
		if ($work && array_key_exists('work_type_id',$work) && array_key_exists($work['work_type_id'],$x))
		{
			$work_type_id=$work['work_type_id'];
			
			foreach ($x[$work_type_id]['show'] as $field)
			{
				echo '<div class="row">';
			
				echo $model->display($form,$field);
				echo '</div>';
			
			}
		}	
   ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

