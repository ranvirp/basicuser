<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reply */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
	.reply-form
	{
		font-size:80%;
		
		width:90%;
		padding:60px;
	}
	</style>
	
<div class="reply-form">
	<h3><strong>Add Reply:</strong></h3>

    <?php $form = ActiveForm::begin(['action'=>\yii\helpers\Url::to(['/reply/default/create?ct='.$model->content_type.'&ctid='.$model->content_type_id])]); ?>
	<?php 
	//$form->action=\yii\helpers\Url::to(['/reply/create?ct='.$model->content_type.'&ctid='.$model->content_type_id]);
	?>

    <?= Html::hiddenInput('ct',$model->content_type ); ?>

    <?= Html::hiddenInput('ctid', $model->content_type_id) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 3]) ?>

    <?= 
		$form->field($model, 'attachments')->widget(\app\modules\reply\widgets\FileWidget::classname()) 
		?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
