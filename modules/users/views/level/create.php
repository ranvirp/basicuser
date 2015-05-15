<?php



/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Level */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Level',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Levels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-create">
<?=  $this->render('_form');
	   ?>
</div>
