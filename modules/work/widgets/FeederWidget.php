<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\work\widgets;
use Yii;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
/**
 * Description of DivisionWidget
 *
 * @author mac
 */
class FeederWidget  extends \yii\base\Widget{
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
echo Html::dropDownList($this->attribute.'-name','',
\yii\helpers\ArrayHelper::map(\app\models\Substation::find()->asArray()->all(),'id','name_'.$lang), ['label'=>'Select Division','prompt'=>'None','id'=>$attribute.'-substation-id']);

// Dependent Dropdown
//echo $form->field($model, $attribute)->widget(
echo '</td><td>';
echo	DepDrop::widget( [
		'model'=>$model,
		'attribute'=>$attribute,
     'options' => [
		 //'id'=>$attribute.'-id'
		 ],
     'pluginOptions'=>[
         'depends'=>[$attribute.'-substation-id'],
         'placeholder' => 'Select...',
         'url' => \yii\helpers\Url::to(['/feeder/get'])
     ]
 ]);
echo '</td></tr></table>';
	}
}
