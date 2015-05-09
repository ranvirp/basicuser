<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\DesignationType */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Designation Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Designation Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
