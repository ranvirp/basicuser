<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\work\models\JEArea */

$this->title = Yii::t('app', 'Create Jearea');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jeareas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jearea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
