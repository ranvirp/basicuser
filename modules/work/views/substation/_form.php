<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\common\Utility;

/* @var $this yii\web\View */
/* @var $model app\modules\work\models\Substation */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 
 $changeattribute='';
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_substation").on("pjax:end", function() {
            $.pjax.reload({container:"#substations"});  //Reload GridView
        });
    });'
);
?>
<div class="bordered-form substation-form">
  <div class="form-title">
    <div class="form-title-span">
        <span>Form for creating Substation</span>
    </div>
</div>
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

    <?= $model->showForm($form,"code") ?>

    <?= $model->showForm($form,"name_hi") ?>

    <?= $model->showForm($form,"name_en") ?>

    <?= $model->showForm($form,"substation_type") ?>

    <?= $model->showForm($form,"voltageratio") ?>

    <?= $model->showForm($form,"mva") ?>

    <?= $model->showForm($form,"mvarmax") ?>

    <?= $model->showForm($form,"mvamax") ?>

    <?= $model->showForm($form,"notrf") ?>

    <?= $model->showForm($form,"capacity") ?>

    <?= $model->showForm($form,"division_id") ?>

    <?= $model->showForm($form,"remarks") ?>

<?php
/*
try {
$x= Utility::rules()["app\modules\work\models\Substation"][$changeattribute];
} catch (Exception $e) {$x=null;}
$modelArray=Yii::$app->request->post("Substation");
		if ($x && $model && array_key_exists($changeattribute,$modelArray) && array_key_exists($modelArray[$changeattribute],$x))
		{
			$attribute_value=$modelArray[$changeattribute];
			
			foreach ($x[$attribute_value]["show"] as $field)
			{
			  
				echo "<div class=\"row\">\n";
			
				echo $model->showForm($form,$field);
				echo "</div>";
			
			}
		}
**/
?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
