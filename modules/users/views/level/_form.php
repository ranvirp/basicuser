<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\common\Utility;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Level */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_level").on("pjax:end", function() {
            $.pjax.reload({container:"#levels"});  //Reload GridView
        });
    });'
);
?>
<div class="level-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $model->showForm($form,"class_name") ?>

   <?= $model->showForm($form,"dept_id") ?>

   <?= $model->showForm($form,"name_hi") ?>

   <?= $model->showForm($form,"name_en") ?>

   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
