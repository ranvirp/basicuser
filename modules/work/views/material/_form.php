<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Material */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-form">

    <?php $form = ActiveForm::begin(['layout'=>'horizontal','action'=>\yii\helpers\Url::to(['/material/create']),'options'=>['data-pjax'=>'1']]); ?>
	
	<?php 
	//$form->options=array_merge($form->options,['layout'=>'horizontal']);
	?>

    <?= $form->field($model, 'work_id')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'dateofissue')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
