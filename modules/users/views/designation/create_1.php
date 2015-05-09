<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Designation */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Designation',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Designations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
