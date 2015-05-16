<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;
use Yii;
use kartik\depdrop\DepDrop;
/**
 * Description of DivisionWidget
 *
 * @author mac
 */
class SubstationWidget  extends \yii\base\Widget{
	//put your code here
	public $model;
	public $attribute;
	public function run() {
		parent::run();
		$model=$this->model;
		$attribute=$this->attribute;
		// Normal parent select
		$lang=Yii::$app->language;
		echo '<table class="table table-responsive"><tr><td>';
echo \yii\helpers\Html::dropDownList($this->attribute.'-name','',
\yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->all(),'id','name_'.$lang), ['label'=>'Select Division','prompt'=>'None','id'=>$attribute.'-division-id']);

// Dependent Dropdown
//echo $form->field($model, $attribute)->widget(
echo '</td><td>';
echo	DepDrop::widget( [
		'model'=>$model,
		'attribute'=>$attribute,
     'options' => ['id'=>$attribute.'-id'],
     'pluginOptions'=>[
         'depends'=>[$attribute.'-division-id'],
         'placeholder' => 'Select...',
         'url' => \yii\helpers\Url::to(['/substation/get'])
     ]
 ]);
echo '</td></tr></table>';
	}
}
