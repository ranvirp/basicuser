<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\Circle */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Circle',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Circles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="circle-create">
<?=  $this->render('_form');
	   ?>
</div>
