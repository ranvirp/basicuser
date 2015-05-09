<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\gpsphoto\widgets;
use Yii;

/**
 * Description of DivisionWidget
 *
 * @author mac
 */
class LeafletWidget  extends \yii\base\Widget{
	//put your code here
	public $gpslat;
	public $gpslong;
	public function run() {
		parent::run();
		// first lets setup the center of our map
$center = new \dosamigos\leaflet\types\LatLng(['lat' => $this->gpslat, 'lng' => $this->gpslong]);

// now lets create a marker that we are going to place on our map
$marker = new \dosamigos\leaflet\layers\Marker(['latLng' => $center, 'popupContent' => 'Hi!']);

// The Tile Layer (very important)
$tileLayer = new \dosamigos\leaflet\layers\TileLayer([
   'urlTemplate' => 'http://otile{s}.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.jpeg',
    'clientOptions' => [
        'attribution' => 'Tiles Courtesy of <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> ' .
        '<img src="http://developer.mapquest.com/content/osm/mq_logo.png">, ' .
        'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        'subdomains' => '1234'
    ]
]);

// now our component and we are going to configure it
$leaflet = new \dosamigos\leaflet\LeafLet([
    'center' => $center, // set the center
]);
// Different layers can be added to our map using the `addLayer` function.
$leaflet->addLayer($marker)      // add the marker
        ->addLayer($tileLayer);  // add the tile layer

// finally render the widget
echo \dosamigos\leaflet\widgets\Map::widget(['leafLet' => $leaflet]);
	}
}
