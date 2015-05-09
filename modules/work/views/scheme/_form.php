<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scheme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scheme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'scheme_code')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'documents')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'finyear')->dropDownList([ '2012-13' => '2012-13', '2013-14' => '2013-14', '2014-15' => '2014-15', '2015-16' => '2015-16', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'noofworks')->textInput() ?>

    <?= $form->field($model, 'totalcost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
