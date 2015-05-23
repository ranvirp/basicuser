<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DesignationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'designation_type_id') ?>

    <?= $form->field($model, 'level_id') ?>

    <?= $form->field($model, 'officer_name_hi') ?>

    <?= $form->field($model, 'officer_name_en') ?>

    <?php // echo $form->field($model, 'officer_mobile') ?>

    <?php // echo $form->field($model, 'officer_mobile1') ?>

    <?php // echo $form->field($model, 'officer_email') ?>

    <?php // echo $form->field($model, 'officer_userid') ?>

    <?php // echo $form->field($model, 'name_hi') ?>

    <?php // echo $form->field($model, 'name_en') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
