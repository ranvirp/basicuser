<?php 
namespace app\modules\work;
class Utility 
{
	
	public static function createWorksChart()
	{

return \dosamigos\highcharts\HighCharts::widget([
    'clientOptions' => [
        
                       'chart' => [
                    'type' => 'bar'
                ],
                'title' => [
                    'text' => 'Material Requirement'
                ],
                'xAxis' => [
                    'categories' => [
                        'Transformer 440KV',
                        'Transformer 63KV',
                        'Transformer 25KV'
                    ]
                ],
                'yAxis' => [
                    'title' => [
                        'text' => 'Number of Units'
                    ]
                ],
                'series' => [
                    ['name' => 'Business Plan', 'data' => [1, 0, 4]],
                    ['name' => 'IDPS', 'data' => [5, 7, 3]]
                ]
            ]]);
	}
}
?>