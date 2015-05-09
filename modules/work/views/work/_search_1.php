<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_hi') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'agency') ?>

    <?= $form->field($model, 'dateofsanction') ?>

    <?php // echo $form->field($model, 'dateoffundsreceipt') ?>

    <?php // echo $form->field($model, 'dateofstart') ?>

    <?php // echo $form->field($model, 'totvalue') ?>

    <?php // echo $form->field($model, 'dept_id') ?>

    <?php // echo $form->field($model, 'work_type_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'gpslat') ?>

    <?php // echo $form->field($model, 'gpslong') ?>

    <?php // echo $form->field($model, 'loc') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'scheme_id') ?>

    <?php // echo $form->field($model, 'work_admin') ?>

    <?php // echo $form->field($model, 'fromloc') ?>

    <?php // echo $form->field($model, 'toloc') ?>

    <?php // echo $form->field($model, 'substation_id') ?>

    <?php // echo $form->field($model, 'division_id') ?>

    <?php // echo $form->field($model, 'package_no') ?>

    <?php // echo $form->field($model, 'work_id') ?>

    <?php // echo $form->field($model, 'phy') ?>

    <?php // echo $form->field($model, 'fin') ?>

    <?php // echo $form->field($model, 'dateofprogress') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'feeder_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
