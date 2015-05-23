<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Designation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designation_type_id')->textInput() ?>

    <?= $form->field($model, 'level_id')->textInput() ?>

    <?= $form->field($model, 'officer_name_hi')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'officer_name_en')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'officer_mobile')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'officer_mobile1')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'officer_email')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'officer_userid')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
