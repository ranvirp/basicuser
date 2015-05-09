<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_requirement".
 *
 * @property integer $id
 * @property integer $work_id
 * @property integer $material_type
 * @property double $qty
 * @property double $value
 *
 * @property MaterialType $materialType
 * @property Work $work
 */
class MaterialRequirement extends \yii\db\ActiveRecord
{
	public $cnt,$totqty;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_requirement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'material_type'], 'integer'],
            [['qty', 'value'], 'number']
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
            'material_type' => 'Material Type',
            'qty' => 'Qty',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialType()
    {
        return $this->hasOne(MaterialType::className(), ['id' => 'material_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }
	public static function getMaterialSummary($query)
	{
		return $query->select('count(*) as cnt,sum(qty) as totqty')->groupBy('material_type_id');
	}
}
