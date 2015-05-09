<?php
 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
 
/* @var $this yii\web\View */
/* @var $searchModel app\models\CountriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 
$this->title = Yii::t('app', 'Work');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">
 
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Work',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 
<!-- Render create form -->    
    <?= $this->render('_form_2', [
        'model' => $model,
    ]) ?>
 
 
<?php Pjax::begin(['id' => 'works','enableReplaceState'=>true]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name_en',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end() ?>
</div>

