<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\DesignationType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designation-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'level_id')->textInput() ?>

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'shortcode')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
