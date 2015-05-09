<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Civil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="civil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'totvalue')->textInput() ?>

    <?= $form->field($model, 'dateofstart')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
