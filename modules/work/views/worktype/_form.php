<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 50,'class'=>'col-md-12 hindiinput']) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 50,'class'=>'col-md-12']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
