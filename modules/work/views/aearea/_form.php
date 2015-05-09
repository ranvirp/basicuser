<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AEArea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aearea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_hi')->textInput(['class'=>'form-control hindiinput','maxlength' => 50]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'division_id')->widget(\app\widgets\DivisionWidget::classname()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
