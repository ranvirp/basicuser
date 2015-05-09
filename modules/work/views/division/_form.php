<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Division */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="division-form">
    <div class="form-title">
        <div class="form-title-span">
            <span>Form for creating Division</span>
        </div>
     </div>

    <?php $lang=Yii::$app->language;?>
    <?php $form = ActiveForm::begin(); ?>
    <?php $items = \yii\helpers\ArrayHelper::map(\app\modules\work\models\Circle::find()->asArray()->all(),'id','name_'.$lang);?>
    <?= $form->field($model, 'circle_id')->dropDownList($items,['id'=>'circle_id']) ?>

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 200,'class'=>'form-control hindiinput']) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 200]) ?>
    <?= $form->field($model, 'code')->textInput(['maxlength' => 200]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
