<?php

namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "feeder".
 *
 * @property integer $id
 * @property string $shortcode
 * @property string $name_en
 * @property integer $circle_id
 * @property integer $substation_id
 * @property string $substation_name
 * @property string $pwtrfcty
 * @property string $pwtrfid
 * @property string $typeofconductor
 * @property string $peakdemand
 * @property string $transformerdesc
 * @property string $totalcapacity
 */
class Feeder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feeder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shortcode', 'name_en', 'substation_name', 'pwtrfcty', 'pwtrfid', 'typeofconductor', 'peakdemand', 'transformerdesc', 'totalcapacity'], 'string'],
            [['circle_id', 'substation_id'], 'integer'],
            [['name_en', 'substation_name', 'pwtrfid'], 'unique', 'targetAttribute' => ['name_en', 'substation_name', 'pwtrfid'], 'message' => 'The combination of Name En, Substation Name and Pwtrfid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shortcode' => Yii::t('app', 'Shortcode'),
            'name_en' => Yii::t('app', 'Name En'),
            'circle_id' => Yii::t('app', 'Circle ID'),
            'substation_id' => Yii::t('app', 'Substation ID'),
            'substation_name' => Yii::t('app', 'Substation Name'),
            'pwtrfcty' => Yii::t('app', 'Pwtrfcty'),
            'pwtrfid' => Yii::t('app', 'Pwtrfid'),
            'typeofconductor' => Yii::t('app', 'Typeofconductor'),
            'peakdemand' => Yii::t('app', 'Peakdemand'),
            'transformerdesc' => Yii::t('app', 'Transformerdesc'),
            'totalcapacity' => Yii::t('app', 'Totalcapacity'),
        ];
    }
}
