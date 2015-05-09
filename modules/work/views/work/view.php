<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Work */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	.grid-view > table 
	{
		font-size:85%;
	}
</style>
<div class="blue1"><h3><?=strtoUpper($model->name_en)?></h3></div>
<div role="tabpanel">
	<ul role="tablist" class="nav nav-tabs">
		<li role="presentation" class="active">
			<a href="#basicinfo" aria-controls="basicinfo" data-toggle="tab" role="tab">Basic Info</a>
		</li>
		<li role="presentation">
			<a href="#gallery" aria-controls="gallery" data-toggle="tab" role="tab">Gallery</a>
		</li>
		
		<li role="presentation" >
			<a href="#matreq" aria-controls="matreq" data-toggle="tab" role="tab">Material Requirement</a>
		</li>
		<li role="presentation" >
			<a href="#comments" aria-controls="comments" data-toggle="tab" role="tab">Comments</a>
		</li>

	</ul>
</div>
<div class="tab-content">
	<div class="tab-pane active" id="basicinfo" role="tabpanel">

		<div class="row">
			<div class="col-sm-6 ">
				<?=
				DetailView::widget([
					'options' => ['class' => 'table table-striped table-bordered detail-view small'],
					'model' => $model,
					'attributes' => [
						'id',
						'name_' . Yii::$app->language . ':ntext',
						[
							'label' => Yii::t('app', 'agency'),
							'value' => \app\models\Agency::findOne($model->agency)->name_en,
						],
						[
							'label' => Yii::t('app', 'dept_id'),
							'value' => \app\models\Department::findOne($model->dept_id)->name_en,
						],
						[
							'label' => Yii::t('app', 'work_type_id'),
							'value' => \app\models\WorkType::findOne($model->work_type_id)->name_en,
						],
						[
							'label' => 'Estimated Cost',
							'value' => $model->totvalue . " lakhs",
						],
						'address',
						'dateofsanction',
						'dateoffundsreceipt',
						'dateofstart',
					],
				])
				?>
			</div>
			<div class="col-sm-6">
				<?=
				DetailView::widget([
					'options' => ['class' => 'table table-striped table-bordered detail-view small'],
					'model' => $model,
					'attributes' => [

						'address',
						'dateofsanction',
						'dateoffundsreceipt',
						'dateofstart',
					],
				])
				?>

			</div>
		</div>
	</div>
		<div class="tab-pane" role="tabpanel" id="gallery">
			<div class='col-sm-1'>
				&nbsp;
			</div>
			<div class="col-sm-9 small">
				<div class="row">
					<?=
					\app\widgets\PhotoWidget::widget(['model' => $model]);
					?>
				</div>
				<div class="row">

					<div class="col-sm-12">'
						<?php
						if (($model->gpslat > 0) && ($model->gpslong > 0)) {
							echo \app\widgets\LeafletWidget::widget(['gpslat' => $model->gpslat, 'gpslong' => $model->gpslong]);
						}
						?>
						'</div>';
				</div>
			</div>
		</div>
			<div class="tab-pane" role ="tabpanel" id="matreq">
				<?php
				$provider = new ActiveDataProvider([
					'query' => \app\models\MaterialRequirement::find()->where(['work_id' => $model->id]),
					'pagination' => [
						'pageSize' => 20,
					],
				]);
				echo $this->render('/materialrequirement/index_1', ['dataProvider' => $provider, 'model' => new \app\models\MaterialRequirement]);
				?>
			</div>
            <div class="tab-pane" role="tabpanel" id="comments">
				<div>
					<?php $reply = new \app\models\Reply;$reply->content_type='w';$reply->content_type_id=$model->id;?>
					<?= $this->render('/reply/_form',['model'=>$reply])?>
				</div>
				<div>
			 <?=$this->render('/reply/list',['model'=>$model])?>
				</div>
			</div>

		</div>
	
