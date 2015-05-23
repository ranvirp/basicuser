<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AEArea */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- $form->field($model, 'division_id')->widget(\app\work\widgets\DivisionWidget::classname()) -->
<div class="aearea-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'code')->textInput(['maxlength' => 5]) ?>
    <?= $form->field($model, 'name_hi')->textInput(['class'=>'form-control hindiinput','maxlength' => 50]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 50]) ?>
    <?= $form->field($model, 'division_id')->dropDownList(ArrayHelper::map(app\modules\work\models\Division::find()->all(),'id','name_en'), ['prompt'=>'Select Division']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
