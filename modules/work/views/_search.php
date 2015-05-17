<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\work\models\MaterialTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_hi') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'unitcost_1314') ?>

    <?= $form->field($model, 'unitcost_1415') ?>

    <?php // echo $form->field($model, 'unitcost_1516') ?>

    <?php // echo $form->field($model, 'unit_type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
