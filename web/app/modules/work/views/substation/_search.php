<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\work\models\SubstationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="substation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name_hi') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'substation_type') ?>

    <?php // echo $form->field($model, 'voltageratio') ?>

    <?php // echo $form->field($model, 'mva') ?>

    <?php // echo $form->field($model, 'mvarmax') ?>

    <?php // echo $form->field($model, 'mvamax') ?>

    <?php // echo $form->field($model, 'notrf') ?>

    <?php // echo $form->field($model, 'capacity') ?>

    <?php // echo $form->field($model, 'division_id') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
