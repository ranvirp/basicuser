<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialRequirement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-requirement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'work_id')->dropDownList(\yii\helpers\ArrayHelper::map(
		\app\models\Work::find()->asArray()->all(),'id','name_'.\Yii::$app->language)) ?>

    <?= $form->field($model, 'material_type')->dropDownList(\yii\helpers\ArrayHelper::map(
		\app\models\MaterialType::find()->asArray()->all(),'id','name_'.\Yii::$app->language)) ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
