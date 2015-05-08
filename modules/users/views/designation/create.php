<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Designation */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Designation',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Designations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-create">
<?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>
</div>
