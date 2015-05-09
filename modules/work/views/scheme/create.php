<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Scheme */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Scheme',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schemes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheme-create">
<?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>
</div>
