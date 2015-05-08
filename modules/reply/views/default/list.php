<?php
//get all replies related to a reply 
$classmap =array_flip(\app\models\Reply::$classmap);
$replies = \app\models\Reply::find()->where(['content_type'=>$classmap[get_class($model)],
	'content_type_id'=>$model->id])->orderBy("create_time desc")->all();
foreach ($replies as $reply)
{
	echo $this->render('_reply',['reply'=>$reply]);
}
?>
