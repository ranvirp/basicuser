<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\users\models\DesignationType;

/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Designation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designation_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\users\models\DesignationType::find()->asArray()->all(),'id','name'), ['prompt'=>'Select Designation Type']); ?>

    <?= $form->field($model, 'level_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\users\models\Level::find()->asArray()->all(),'id','name'), ['prompt'=>'Select Level']); ?>

    <?= $form->field($model, 'officer_name_hi')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'officer_name_en')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'officer_mobile')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'officer_mobile1')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'officer_email')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'officer_userid')->textInput() ?>

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
