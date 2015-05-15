<?php



/* @var $this yii\web\View */
/* @var $model app\modules\users\models\Department */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Department',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">
<?=  $this->render('_form');
	   ?>
</div>
