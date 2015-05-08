<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
<div class="col-lg-6">
 <img src="<?=$model->url?>"/>
 </div>
 <div class="col-lg-6">
 
 <?=	 \app\widgets\LeafletWidget::widget(['gpslat'=>$model->gpslat,'gpslong'=>$model->gpslong]);?>
<p><b>Latitude:</b><?=$model->gpslat;?>,<b>Longitude</b>:<?=$model->longitude?></p>
</div>	
</div>
</div>
