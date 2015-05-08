<?php

echo '<div id="portfoliowrap">
        <h3>'.$title.'</h3>

        <div class="portfolio-centered">';
$options=['class'=>"recentitems portfolio isotope","style"=>"position: relative; overflow: hidden; height: 384px;"];
echo yii\widgets\ListView::widget([
'dataProvider'=>$dataProvider,
'itemOptions'=>['class'=>"portfolio-item graphic-design isotope-item", 'style'=>"float:left;position: relative; left: 0px; top: 0px; transform: translate(0px, 0px); width: 256px;"],
'itemView'=>function($photo,$key,$index,$widget)
{
          return '		
				   
				
					<div class="he-wrap tpl6">
					<img alt="'.$photo->title.'" src="'.$photo->url.'">
						<div class="he-view">
							<div data-animate="fadeIn" class="bg a0">
                                <h3 data-animate="fadeInDown" class="a1">'.$photo->title.'</h3>
                                <a data-animate="fadeInUp" class="dmbutton a2" href="assets/img/portfolio/portfolio_09.jpg" data-rel="prettyPhoto"><i class="fa fa-search"></i></a>
                                <a data-animate="fadeInUp" class="dmbutton a2" href="single-project.html"><i class="fa fa-link"></i></a>
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->';
				;
}        
 ]);        
                    
            
        echo '</div><!-- portfolio container -->
	 </div>';