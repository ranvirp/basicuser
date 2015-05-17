<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\Agency */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Agency',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Agencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agency-create">
<?=  $this->render('_form');
	   ?>
</div>
