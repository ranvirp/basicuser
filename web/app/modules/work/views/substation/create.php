<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\Substation */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Substation',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Substations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substation-create">
<?=  $this->render('_form');
	   ?>
</div>
