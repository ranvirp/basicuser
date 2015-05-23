<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\work\models\MaterialSubCategory */

$this->title = Yii::t('app', 'Create Material Sub Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Material Sub Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-sub-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
