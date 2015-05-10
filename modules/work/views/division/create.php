<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\Division */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Division',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Divisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="division-create">
<?=  $this->render('_form');
	   ?>
</div>
