
<div class="container well ">
<div class="row">
 <div class="col-md-8">
	<p>
		<csmall>Posted by <?php $user=\app\models\User::find()->where(['id'=>$reply->author_id])->one();
			echo $user?$user->username:'';?></csmall>|
		<csmall2>Posted  <?=\kartik\helpers\Enum::timeElapsed(date("F j, Y, g:i a",$reply->create_time))?></csmall2>
		
	</p>
	<p>
	<?=$reply->content?>
		
	</p>
	</div>
		<div class="col-md-4 pull-right">
		<h4> Attachments</h4>
		<div class="hline"></div>
		<p></p>
			<?=\app\modules\reply\models\File::showAttachmentsInline($reply,'attachments')?>
		</div>
	</div>
	
</div>


