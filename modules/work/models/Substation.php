<?php

namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "substation".
 *
 * @property integer $id
 * @property string $shortcode
 * @property string $name_hi
 * @property string $name_en
 * @property integer $type
 * @property string $documents
 * @property integer $division_id
 * @property integer $je_area_id
 * @property string $voltageratio
 * @property string $mva
 * @property string $notrf
 * @property string $capacity
 * @property string $mvamax
 * @property string $mvarmax
 * @property string $remarks
 * @property integer $circle_id
 *
 * @property Work[] $works
 * @property Division $division
 * @property Circle $circle
 */
class Substation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'substation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'division_id', 'je_area_id', 'circle_id'], 'integer'],
            [['documents', 'notrf', 'capacity', 'mvamax', 'mvarmax', 'remarks'], 'string'],
            [['shortcode'], 'string', 'max' => 7],
            [['name_hi', 'name_en'], 'string', 'max' => 50],
            [['voltageratio'], 'string', 'max' => 30],
            [['mva'], 'string', 'max' => 20]
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
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
            'type' => Yii::t('app', 'Type'),
            'documents' => Yii::t('app', 'Documents'),
            'division_id' => Yii::t('app', 'Division ID'),
            'je_area_id' => Yii::t('app', 'Je Area ID'),
            'voltageratio' => Yii::t('app', 'Voltageratio'),
            'mva' => Yii::t('app', 'Mva'),
            'notrf' => Yii::t('app', 'Notrf'),
            'capacity' => Yii::t('app', 'Capacity'),
            'mvamax' => Yii::t('app', 'Mvamax'),
            'mvarmax' => Yii::t('app', 'Mvarmax'),
            'remarks' => Yii::t('app', 'Remarks'),
            'circle_id' => Yii::t('app', 'Circle ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['substation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivision()
    {
        return $this->hasOne(Division::className(), ['id' => 'division_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCircle()
    {
        return $this->hasOne(Circle::className(), ['id' => 'circle_id']);
    }
}
