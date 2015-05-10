<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\MaterialType */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Material Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Material Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-type-create">
<?=  $this->render('_form');
	   ?>
</div>
