<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Photo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
             'size',
			[
				'header'=>'User',
				'value'=>function($model,$key,$index,$column)
                           	{
		                     if ($model->created_by >0)
		                      return \app\models\User::findOne($model->created_by)->username;
				            }
			],
				[
				'header'=>'Location',
				'value'=>function($model,$key,$index,$column)
                           	{
				  if ($model->gpslat && $model->gpslong){
		                     $x= \app\widgets\LeafletWidget::widget(['gpslat'=>$model->gpslat,'gpslong'=>$model->gpslong]);
				  
							 return $x;
				  }
							 else 
					   return "Location not set";
							},
								'format'=>'html'
			],
				[
				  'header'=>'Image',
				  'value'=>function($model,$key,$index,$column)
                           	{ return '<img src="'.$model->url.'"/>'	;
							},
								'format'=>'html'
				],
            // 'url:ntext',
            // 'path:ntext',
            // 'filename:ntext',
            // 'gpslat',
            // 'gpslong',
            // 'loc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
