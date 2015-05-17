<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\work\models\MaterialType */
/* @var $form ActiveForm */
?>
<div class="MaterialCategory">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'unitcost_1314') ?>
        <?= $form->field($model, 'unitcost_1415') ?>
        <?= $form->field($model, 'unitcost_1516') ?>
        <?= $form->field($model, 'name_hi') ?>
        <?= $form->field($model, 'name_en') ?>
        <?= $form->field($model, 'unit_type') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- MaterialCategory -->
