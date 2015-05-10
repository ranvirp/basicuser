<?php



/* @var $this yii\web\View */
/* @var $model app\modules\work\models\Scheme */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Scheme',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schemes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheme-create">
<?=  $this->render('_form');
	   ?>
</div>
