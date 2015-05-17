<?php 
namespace app\modules\work;
class Utility 
{
	
	public static function createWorksChart()
	//$title="Material Requirement",$xAxis,$yAxis,$series)
	{

return \dosamigos\highcharts\HighCharts::widget([
    'clientOptions' => [
        
                       'chart' => [
                    'type' => 'pie'
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
	public static function createPieChart()
	{
            /*
	return \dosamigos\highcharts\HighCharts::widget([
    'clientOptions' => [
	   'chart'=> [
            'plotBackgroundColor'=> null,
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ],
        'title'=> [
            'text'=> 'Browser market shares at a specific website, 2014'
        ],
        'tooltip'=> [
            'pointFormat'=> '[series.name]: <b>[point.percentage:.1f]%</b>'
        ],
        'plotOptions'=> [
            'pie'=> [
                'allowPointSelect'=> true,
                'cursor'=> 'pointer',
                'dataLabels'=> [
                    'enabled'=> true,
                    'format'=> '<b>[point.name]</b>: [point.percentage:.1f] %',
                    'style'=> [
                        'color'=>  'black'
                    ]
                ]
            ]
        ],
        'series'=> [[
            'type'=> 'pie',
            'name'=> 'Browser share',
            'data'=> [
                ['Firefox',   45.0],
                ['IE',       26.8],
                [
                    'name'=> 'Chrome',
                    'y'=> 12.8,
                    'sliced'=> true,
                    'selected'=> true
                ],
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        ]]]
    ]);
*/
	}
	
}
?>