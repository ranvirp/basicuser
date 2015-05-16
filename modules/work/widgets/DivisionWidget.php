<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\work\widgets;
use Yii;
use yii\helpers\Html;
/**
 * Description of DivisionWidget
 *
 * @author mac
 */
class DivisionWidget  extends \yii\base\Widget{
	//put your code here
	public $model;
	public $attribute;
	public function run() {
		parent::run();
		$model=$this->model;
		$attribute=$this->attribute;
		// Normal parent select
		$lang=Yii::$app->language;
		$url=\yii\helpers\Url::to(['/work/utility/getdivision?c=']);
		$id=$attribute.'-id';
		echo '<div class="row"><div class="col-md-6">';
		
echo Html::dropDownList($this->attribute.'-circle-id','',
\yii\helpers\ArrayHelper::map(\app\modules\work\models\Circle::find()->asArray()->all(),'id','name_'.$lang), ['prompt'=>'Select Circle','class'=>'form-control','label'=>'Circle','id'=>$attribute.'-circle-id',
'onChange'=>"js:populateDropdown('".$url."'+$(this).val(),'".$id."')"]);

// Dependent Dropdown
//echo $form->field($model, $attribute)->widget(
echo '</div><div class="col-md-6">';
echo	Html::activeDropDownList( 
		$model,
		$attribute,[],
      ['id'=>$attribute.'-id','class'=>'form-control','prompt'=>'None']
     );
echo '</div></div>';
	}
}
