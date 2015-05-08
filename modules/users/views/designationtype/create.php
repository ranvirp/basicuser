<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\DesignationType */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Designation Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Designation Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-type-create">
<?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>
</div>
