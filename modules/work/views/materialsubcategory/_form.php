<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\work\models\MaterialSubCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-sub-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'material_category')->dropDownList(\yii\helpers\ArrayHelper::map(
		\app\modules\work\models\MaterialCategory::find()->asArray()->all(),'id','name_'.\Yii::$app->language)) ?>        
    );
    
     <?= $form->field($model, 'material_subcategory')->dropDownList(\yii\helpers\ArrayHelper::map(
		\app\modules\works\models\MaterialSubCategory::find()->asArray()->all(),'material_category_id','name_'.\Yii::$app->language)) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
