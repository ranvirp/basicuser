<?php
 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 
/* @var $this yii\web\View */
/* @var $searchModel app\models\CountriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 $work=\app\models\Work::findOne($model->work_id);
$this->title = Yii::t('app', 'Material Requirement for '.$work->name_en);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-success">
	<div class="panel panel-heading">
		<?=$this->title?>
	</div>
	<div class="panel panel-body">
<dl>
	<dt>Work Id</dt>
	<dd><?=$work->work_id?></dd>
	<dt>Name of Work</dt>
	<dd><?=$work->name_en?></dd>
</dl>
<div class="matreq-index">
 
   
 
<!-- Render create form -->    
    <?= $this->render('_form_2', [
        'model' => $model,
    ]) ?>
 
 
<?php Pjax::begin(['id' => 'matreqs','enableReplaceState'=>true]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
			'materialType.name_en',
			'qty',
			'materialType.unitcost_1415',
			['header'=>'value(in Rs. lakhs','value'=>function($model,$key,$index,$column){return $model->qty*$model->materialType->unitcost_1415/100000;}],
			['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end() ?>
</div>
	</div>
</div>
</div>
