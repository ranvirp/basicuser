<?php

namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "scheme".
 *
 * @property integer $id
 * @property string $scheme_code
 * @property string $name_hi
 * @property string $name_en
 * @property string $documents
 * @property string $description
 * @property string $finyear
 * @property integer $noofworks
 * @property double $totalcost
 *
 * @property Work[] $works
 */
class Scheme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scheme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documents', 'description', 'finyear'], 'string'],
            [['noofworks'], 'integer'],
            [['totalcost'], 'number'],
            [['scheme_code'], 'string', 'max' => 20],
            [['name_hi', 'name_en'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'scheme_code' => Yii::t('app', 'Scheme Code'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
            'documents' => Yii::t('app', 'Documents'),
            'description' => Yii::t('app', 'Description'),
            'finyear' => Yii::t('app', 'Finyear'),
            'noofworks' => Yii::t('app', 'Noofworks'),
            'totalcost' => Yii::t('app', 'Totalcost'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['scheme_id' => 'id']);
    }
	//http://www.yiiframework.com/wiki/679/filter-sort-by-summary-data-in-gridview-yii-2-0/
	public function getWorksCost()
    {
        return $this->hasMany(Work::className(), ['scheme_id' => 'id'])->sum('totvalue');
    }
	public function getWorksCount()
    {
        return $this->hasMany(Work::className(), ['scheme_id' => 'id'])->count('totvalue');
    }
	
}
