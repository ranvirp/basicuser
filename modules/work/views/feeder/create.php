<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\Feeder */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Feeder',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feeders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeder-create">
<?=  $this->render('_form');
	   ?>
</div>
