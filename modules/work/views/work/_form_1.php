<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_hi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'agency')->textInput() ?>

    <?= $form->field($model, 'dateofsanction')->textInput() ?>

    <?= $form->field($model, 'dateoffundsreceipt')->textInput() ?>

    <?= $form->field($model, 'dateofstart')->textInput() ?>

    <?= $form->field($model, 'totvalue')->textInput() ?>

    <?= $form->field($model, 'dept_id')->textInput() ?>

    <?= $form->field($model, 'work_type_id')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'gpslat')->textInput() ?>

    <?= $form->field($model, 'gpslong')->textInput() ?>

    <?= $form->field($model, 'loc')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'scheme_id')->textInput() ?>

    <?= $form->field($model, 'work_admin')->textInput() ?>

    <?= $form->field($model, 'fromloc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'toloc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'substation_id')->textInput() ?>

    <?= $form->field($model, 'division_id')->textInput() ?>

    <?= $form->field($model, 'work_id')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'phy')->textInput() ?>

    <?= $form->field($model, 'fin')->textInput() ?>

    <?= $form->field($model, 'dateofprogress')->textInput() ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'feeder_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
