
<style>
	.icon-box
	{
		border:1px solid #e30101;
		border-radius:10px;
		margin:10px;
		margin-left: 50px;
		text-align: center;
		vertical-align: middle;
		height:75px;
		
	}
	.icon-box-top
	{
		height:40px;
		background-color: gold;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
		
	}
	.links
	{
		border-top:1px solid #fff;
	}
</style>
<div class='row'>
	<div class='col-lg-12'>
	<?php
use yii\helpers\Url;

$items=['Work'=>'work','Material Requirement'=>'materialrequirement',
	    'Division'=>'division','Scheme'=>'scheme'];
foreach ($items as $label=>$item)
{
	
echo '<div class="col-md-3 col-sm-6 icon-box">
	<div class="row icon-box-top"><span>'.$label.'</span></div>
	 
	<div class="row links">
	<a href="'.Url::to(['/'.$item.'/index']).'"><i class="fa fa-search"></i></a>
    
    </div>
</div>'."\n";

}
?>
</div>
</div>


