<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Level */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Level',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Levels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-create">
<?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>
</div>
