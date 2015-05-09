<?php

namespace app\modules\gpsphoto\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property string bwid
 * @property integer $height
 * @property integer $width
 * @property string $mime
 * @property integer $size
 * @property string $url
 * @property string $path
 * @property string $filename
 * @property double $gpslat
 * @property double $gpslong
 * @property string $loc
 * @property integer approved
 * @property imei
 * @property mobileno
 * @property devicesoftware
 *@property 
 */
class Photo extends \yii\db\ActiveRecord
{
  public $nearby=50; //50 meters
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'height', 'width', 'size','created_by'], 'integer'],
            [['bwid','url', 'path', 'filename', 'title','imei','mobileno','devicesoftware'], 'string'],
            [['gpslat', 'gpslong','approved'], 'number'],
            [['mime'], 'string', 'max' => 50],
            [['title'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            
            'height' => 'Height',
            'width' => 'Width',
            'mime' => 'Mime',
            'size' => 'Size',
            'url' => 'Url',
            'path' => 'Path',
            'filename' => 'Filename',
            'gpslat' => 'Latitude',
            'gpslong' => 'Longitude',
            'loc' => 'Loc',
        ];
    }

   
    /*
    */
     public function findNearBy($id)
     {
        $photo= $this->findModel($id);
        
     }
}
