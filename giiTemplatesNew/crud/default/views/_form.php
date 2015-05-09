<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\common\Utility;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>
<?php echo "<?php\n";?>
 
 $changeattribute='';
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>").on("pjax:end", function() {
            $.pjax.reload({container:"#<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>s"});  //Reload GridView
        });
    });'
);
?>
<div class="bordered-form <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">
  <div class="form-title">
    <div class="form-title-span">
        <span>Form for creating <?=StringHelper::basename($generator->modelClass)?></span>
    </div>
</div>
    <?= "<?php " ?>$form = ActiveForm::begin([
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

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . '$model->showForm($form,"'.$attribute . '") ?>'."\n\n";
    }
}
echo '<?php
/*
try {
$x= Utility::rules()["'.$generator->modelClass.'"][$changeattribute];
} catch (Exception $e) {$x=null;}
$modelArray=Yii::$app->request->post("'.StringHelper::basename($generator->modelClass).'");
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
?>';

?>
    <div class="form-group">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
