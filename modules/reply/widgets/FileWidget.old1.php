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
			$file = \app\models\File::findOne($id);
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
		'previewSettings'=>['image'=>['width'=>"50px",'height'=>'50px']],
		 'initialPreview'=>$y,
'overwriteInitial'=>false,
		'previewTemplates'=>['html1'=> '<div class="col-md-3">'
			. '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}">' +
        '   {content}' +
        '   {footer}'. '<div>Title:<input class="activeInput" name="title[{fileindex}]" id="title-{fileindex}" /></div>'
			. '</div>' +
        '</div>\n','image1'=> '<div class="col-md-3">'
			. '<div class="file-preview-frame{frameClass}" id="{previewId}" data-fileindex="{fileindex}">' .
        '   <img src="{data}" class="file-preview-image" title="{caption}" alt="{caption}" '  . '>' .
        '   {footer}' .
        '</div>'
			. '<div>Title:<input class="activeInput" name="title[{fileindex}]" id="title-{fileindex}" /></div>'
			. '</div>',],
		'layoutTemplates'=>['preview1'=>'<div class="file-preview {class}">' .
        '    <div class="close fileinput-remove">&times;</div>\n' .
        '    <div class="{dropClass}">\n' .
        '    <div class="file-preview-thumbnails">' .
        '    </div>' .
        '    <div class="clearfix"></div>' .
        '    <div class="file-preview-status text-center text-success"></div>' .
        '    <div class="kv-fileinput-error"></div>' .
        '    </div>' .
			 '</div>'
		, 
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
