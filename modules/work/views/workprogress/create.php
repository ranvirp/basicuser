<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\WorkProgress */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Work Progress',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Progresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-progress-create">
<?=  $this->render('_form');
	   ?>
</div>
