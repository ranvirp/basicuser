<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\common\Utility;

/* @var $this yii\web\View */
/* @var $model app\models\WorkProgress */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_work-progress").on("pjax:end", function() {
            $.pjax.reload({container:"#work-progresss"});  //Reload GridView
        });
    });'
);
?>
<h3>Form for creating work-progress</h3>
<div class="work-progress-form">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>

    <?= $model->showForm($form,"work_id") ?>
 <?= $model->showForm($form,"dateofprogress") ?>

   <?= $model->showForm($form,"physical") ?>

   <?= $model->showForm($form,"financial") ?>
    <?= $model->showForm($form,"expenditure") ?>

  
  <?= $model->showForm($form,"remarks") ?>


  


   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
