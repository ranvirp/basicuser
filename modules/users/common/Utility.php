<?php
namespace app\common;
class Utility
{
public function rules()
{
$x['\app\models\Work']['work_type']=  [3=>['show'=>['address','gpslat','gpslong'],'required'=>['address','gpslat','gpslong']],
			4=>['show'=>['substation_id'],'required'=>['substation_id']],
			5=>['show'=>['substation_id'],'required'=>['substation_id']],
			6=>['show'=>['substation_id'],'required'=>['substation_id']],
			7=>['show'=>['substation_id','fromloc','toloc'],'required'=>['substation_id']],
			8=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			9=>['show'=>['substation_id'],'required'=>['substation_id']],
			10=>['show'=>['substation_id','feeder_id'],'required'=>['substation_id','feeder_id']],
			11=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			12=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			13=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			14=>['show'=>['substation_id'],'required'=>['substation_id']],
			15=>['show'=>['address','gpslat','gpslong'],'required'=>['address','gpslat','gpslong']],
			16=>['show'=>['address','gpslat','gpslong'],'required'=>['address','gpslat','gpslong']],
			17=>['show'=>['substation_id','fromloc','toloc'],'required'=>['substation_id','fromloc','toloc']],
			18=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			19=>['show'=>['substation_id'],'required'=>['substation_id']],
			
			];
		$x["app\modules\users\models\Designation"]["designation_type_id"]=[];
			return $x;
}
}
?>
