<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Work */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Work',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Works'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-create">
<?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>
</div>
