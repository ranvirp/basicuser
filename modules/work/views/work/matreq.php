<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use \yii\helpers\Html;
$i=1;
?>
<div id='mrc'>
	   <span class="btn btn-success" onclick="var t=$('#row1').clone();$('#mainmrc').append(t);"><i class='fa fa-plus' ></i>Add </span>
	   <div id='mainmrc' >
		   <div class='row'>
			
		   </div>
		   <?php $model1=new \app\models\MaterialRequirement;?>
		   <div class='row' id="row1">
			   <?= $form->field($model1,'id[]')->hiddenInput()?>
			   <div class='col-sm-4'>
		  <?= $form->field($model1, 'material_type[]')->dropDownList(\yii\helpers\ArrayHelper::map(
		\app\models\MaterialType::find()->asArray()->all(),'id','name_'.\Yii::$app->language),[]) ?>
			   </div>
			   <div class='col-sm-4'>
    <?= $form->field($model1, 'qty[]')->textInput() ?>
			   </div>
			   <div class='col-sm-4'>

    <?= $form->field($model1, 'value[]')->textInput() ?> 
			   </div>
		   </div>
		   <?php foreach ($workmodel->getMaterialRequirements()->all() as $model1):?>
		   <?php $i++; ?>

		   <div class='row' id="row"<?=$i?>>
			   <?php if ($model1->id ) echo Html::activeHiddenInput($model1,'id[]',['value'=>$model1->id]);?>
			   <div class='col-sm-4'>
		  <?= Html::activeDropDownList($model1, 'material_type[]',\yii\helpers\ArrayHelper::map(
		\app\models\MaterialType::find()->asArray()->all(),'id','name_'.\Yii::$app->language),['options'=>['58'=>['selected']]]) ?>
			   </div>
			   <div class='col-sm-4'>
    <?= $form->field($model1, 'qty[]')->textInput(['value'=>$model1->qty]) ?>
			   </div>
			   <div class='col-sm-4'>

    <?= $form->field($model1, 'value[]')->textInput(['value'=>$model1->value]) ?> 
			   </div>
		   </div>
		   <?php endforeach;?>
	   </div>
   </div>