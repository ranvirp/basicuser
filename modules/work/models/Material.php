<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id
 * @property integer $work_id
 * @property integer $type
 * @property double $qty
 * @property string $unit
 * @property string $dateofissue
 *
 * @property Work $work
 * @property MaterialType $type0
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'type'], 'integer'],
            [['qty'], 'number'],
            [['dateofissue'], 'safe'],
            [['unit'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_id' => 'Work ID',
            'type' => 'Type',
            'qty' => 'Qty',
            'unit' => 'Unit',
            'dateofissue' => 'Dateofissue',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(MaterialType::className(), ['id' => 'type']);
    }
}
