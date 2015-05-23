<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\WorkType */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Work Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-type-create">
<?=  $this->render('_form');
	   ?>
</div>
