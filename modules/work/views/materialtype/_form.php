<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 1000,'class'=>'col-md-12 hindiinput']) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 1000,'class'=>'col-md-12',
		'onClick'=>'js:lookAhead($(this))']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div id="table">
	
</div>
<?php
 $js ="function writeTable(data){
	 
    var html='<table><tr><th>Name</th></tr>';
	for
	html+='<tr><td></td></tr>'+data+'</table>';
	$('#table').html(html);
}
function lookAhead(obj)
	 {
	 
	    if (obj.length>0) 
	     {
		   $.get('".yii\helpers\Url::to(['/materialtype/getlist?lang='.Yii::$app->language.'&b=']).
	 "'+obj.val(),function(data) {
		 data=JSON.parse(data);
		 $('#table').html('');
		 writeTable(data);
	     })}};
	 ";
	 
$this->registerJs($js,\yii\web\view::POS_HEAD);
?>
