<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\work\models\JEArea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jearea-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'division_id')->dropDownList(ArrayHelper::map(app\modules\work\models\Division::find()->all(),'id','name_en'), ['prompt'=>'Select Division']) ?>
    <?= $form->field($model, 'ae_area_id')->dropDownList(ArrayHelper::map(app\modules\work\models\AEArea::find()->all(),'id','name_en'), ['prompt'=>'Select AE Area'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
