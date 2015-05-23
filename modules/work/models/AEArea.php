<?php

namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "ae_area".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 * @property integer $division_id
 */
class AEArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ae_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['division_id'], 'integer'],            
            [['code'],'string','max' => 5],
            [['name_hi', 'name_en'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'CODE',
            'name_hi' => 'Name Hi',
            'name_en' => 'Name En',
            'division_id' => 'Division ID',
        ];
    }
}
