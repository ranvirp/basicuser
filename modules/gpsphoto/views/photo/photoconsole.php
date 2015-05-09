<?php
use yii\grid\GridView;
$dataProvider=new yii\data\ActiveDataProvider(['query'=>\app\models\Photo::find()->where('approved = 0')->orderBy('created_at desc')]);
$model=new app\models\Photo;
  yii\widgets\Pjax::begin(['id' => 'new_work']);
echo GridView::widget([
  'dataProvider'=>$dataProvider,
   'filterModel'=>$model,
   'columns'=>[
      ['class'=>'yii\grid\SerialColumn'],
      'created_by',
      'bwid',
      'title',
      ['header'=>'Photo','format'=>'html','value'=>function($model,$key,$index,$column)
                                                     {
                                                        return '<img src="'.$model->url.'">'.$model->title.'</img>';
                                                     }
      ],
      ['header'=>'Action','format'=>'raw','value'=>function($model,$key,$index,$column)
                                                     {
                                                        return '<form method="POST">'.
                                                               '<input type="hidden" name="id" value="'.$model->id.'"/>'."\n".
                                                                '<input type="hidden" name="'. Yii::$app->request->csrfParam.'" value="'.Yii::$app->request->csrfToken.'" />'."\n".
                                                               '<input type="hidden" name="approved" value="1"/>'."\n".
                                                               '<input type="submit" value="Approve"/>'.
                                                               '</form>'."\n".
                                                               '<form method="POST">'.
                                                               '<input type="hidden" name="id" value="'.$model->id.'"/>'."\n".
                                                               '<input type="hidden" name="approved" value="-1"/>'."\n".
                                                               '<input type="hidden" name="'. Yii::$app->request->csrfParam.'" value="'.Yii::$app->request->csrfToken.'" />'."\n".
                                                               
                                                               '<input type="submit" value="Reject"/>'.
                                                               '</form>'."\n";
                                                               
                                                     }
      
      
   ],

]]);
 yii\widgets\Pjax::end();
?>