<?php
use yii\data\ActiveDataProvider;
//http://www.yiiframework.com/wiki/679/filter-sort-by-summary-data-in-gridview-yii-2-0/
 $dataProvider = new ActiveDataProvider([
            'query' => \app\models\Scheme::find(),
        ]);
 use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Schemes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheme-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Scheme',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'scheme_code',
            'name_hi',
            'name_en',
            
            // 'description:ntext',
             'finyear',
             'noofworks',
             'totalcost',
			
			'worksCount',
			'worksCost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>



