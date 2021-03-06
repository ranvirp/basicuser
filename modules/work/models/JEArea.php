<?php

namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "je_area".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 * @property integer $division_id
 */
class JEArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'je_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['division_id'], 'integer'],
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
            'name_hi' => 'Name Hi',
            'name_en' => 'Name En',
            'division_id' => 'Division ID',
        ];
    }
}
