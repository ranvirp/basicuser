<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\work\models\MaterialType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'unitcost_1314')->textInput() ?>

    <?= $form->field($model, 'unitcost_1415')->textInput() ?>

    <?= $form->field($model, 'unitcost_1516')->textInput() ?>

    <?= $form->field($model, 'unit_type')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
