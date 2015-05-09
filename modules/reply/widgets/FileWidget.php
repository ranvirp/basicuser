<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\reply\widgets;
use Yii;

/**
 * Description of FileWidget
 *
 * @author Ranvir Prasad<ranvir.prasad@gmail.com>
 */
class FileWidget  extends \yii\base\Widget{
	//put your code here
	public $model;
	public $attribute;
	public $name='';
	public function run() {
		parent::run();
		$model=$this->model;
		$attribute=$this->attribute;
		// Normal parent select
		$lang=Yii::$app->language;
	$modelName=\yii\helpers\StringHelper::basename(get_class($model));	
	//echo '<style> .file-drop-zone{height:0%}</style>';
	$y=[];
	$z1='';	
	
	if ($model->$attribute !='')
	{
		foreach (explode(",",$model->$attribute) as $id)
		{
			$file = \app\modules\reply\models\File::findOne($id);
			if ($file)
			{
				$z1 .= "<input type=hidden name='".
			 $modelName.'_'.''.$attribute.'[]'."' value=\"".$file->id.'">'."\n";
				//echo '<div>'.$z1.'</div>';
				
			if ($file->mime=='img/jpeg')
				$y[]=Html::img($file->url,['class'=>'file-preview-image','title'=>$file->title]);
			else $y[]='<a href="'.$file->url.'">'.$file->title.'</a>';
			}
		}
	}
	echo '<div class="col-lg-12">';
	
 echo \kartik\file\FileInput::widget( [
	'model'=>$model,
	'attribute'=>$attribute.'[]',
    'options' => ['multiple' => true],
	'pluginOptions'=>
	[
		'uploadUrl'=>  yii\helpers\Url::to(['/reply/file/upload']),
		'uploadExtraData'=>['model'=>get_class($model),'attribute'=>$attribute],
		'browseLabel'=>'Select files',
		'dropZoneEnabled'=>false,
		'showPreview'=>true,
		//'showCaption' => false,
        'showRemove' => false,
        'showUpload' => false,
        //'browseClass' => 'btn btn-primary btn-block',
        //'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        //'browseLabel' =>  'Select Photo',
		'previewSettings'=>['image'=>['width'=>"150px",'height'=>'150px']],
		 'initialPreview'=>$y,
        'overwriteInitial'=>false,
		'previewTemplates'=>[],
		'layoutTemplates'=>[
		  'footer'=>'<div class="file-thumbnail-footer">' .
        '    <div class="file-caption-name">{caption}</div>' .
        '    {actions}' .
        '<div>Title:<input class="activeInput" name="title[{fileindex}]" id="title-{fileindex}" /></div>'
       	.'</div>'
		  ],
	],
	 
	     'pluginEvents' => [
            "filepreupload" => "function(event, data, previewId, index) {
               var form = data.form, files = data.files, extra = data.extra,
               response = data.response, reader = data.reader;

               $('.activeInput').each(function() {
                 data.form.append($(this).attr('name'),$(this).val());
               });

             }",
			   "fileuploaded" => "function(event, data, previewId, index) {
                var form = data.form, files = data.files, extra = data.extra,
                response = data.response, reader = data.reader;

                for (ind=0;ind<data.response.length;ind++)
                 {
                  //alert(data.response[ind]);
                  $('#".$modelName.'_'.$attribute.'_hi'."').append('<input type=hidden name=".
			      $modelName.'_'.''.$attribute.'[]'." value=\"'+data.response[ind]+'\">');
                 }

                 }",
    
    ],
	  
]); 
 //echo $z1;
 echo '<div id="'.$modelName.'_'.$attribute.'_hi" >'.$z1.'</div>';
 echo '</div>';
 
	}
}
