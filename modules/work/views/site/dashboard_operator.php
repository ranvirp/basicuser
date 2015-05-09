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
$items=['Designation'=>['url'=>'/masterdata/designation','faicon'=>'comments','class'=>'\app\modules\masterdata\models\Designation'],
	    'Designation Type'=>['url'=>'/masterdata/designationtype','faicon'=>'comments','class'=>'\app\modules\masterdata\models\DesignationType'],
	    'Level'=>['url'=>'/masterdata/level','faicon'=>'tasks','class'=>'\app\modules\masterdata\models\Level'],
	'Circle'=>['url'=>'/circle','faicon'=>'circle','class'=>'\app\models\Circle'],
	'Division'=>['url'=>'/division','faicon'=>'circle','class'=>'\app\models\Division'],
	'Work Type'=>['url'=>'/worktype','faicon'=>'circle','class'=>'\app\models\WorkType'],
	'Material Type'=>['url'=>'/materialtype','faicon'=>'circle','class'=>'\app\models\MaterialType'],
	'Work'=>['url'=>'/work','faicon'=>'circle','class'=>'\app\models\Work'],
	'Material Requirement'=>['url'=>'/materialrequirement','faicon'=>'circle','class'=>'\app\models\MaterialRequirement'],
	
	
	
	
	
	    ];
foreach ($items as $label=>$item)
{
	
echo '<div class="col-md-3 col-sm-6">
	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-'.$item['faicon'].' fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$item['class']::find()->count().'</div>
                                    <div>New '.$label.'!</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
							   <a href="'.Url::to([$item['url'].'/index']).'">
								   <p>
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
								</p>
								 </a>
								 <a href="'.Url::to([$item['url'].'/create']).'">
								
								<p>
                                <span class="pull-left">Create New</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
								</p>
								</a>
                            </div>
                       
                    </div></div>'."\n";

}

?>
</div>
</div>
