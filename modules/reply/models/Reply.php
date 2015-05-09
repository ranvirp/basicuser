<?php

namespace app\modules\reply\models;

use Yii;

/**
 * This is the model class for table "reply".
 *
 * @property integer $id
 * @property string $content_type
 * @property integer $content_type_id
 * @property string $content
 * @property string $attachments
 * @property integer $create_time
 * @property integer $author_id
 * @property integer $update_time
 */
class Reply extends \yii\db\ActiveRecord
{
    
	/*
	 * Shortcuts for classes to which reply shall be attached
	 */
	public static $classmap=['w'=>'app\models\Work','d'=>'\app\modules\users\models\Designation'];
	
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_type_id', 'create_time', 'author_id', 'update_time'], 'integer'],
            [['content'], 'string'],
			[['content_type'], 'string', 'max' => 50],
			[['attachments'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_type' => 'Content Type',
            'content_type_id' => 'Content Type ID',
            'content' => 'Content',
            'attachments' => 'Attachments',
            'create_time' => 'Create Time',
            'author_id' => 'Author ID',
            'update_time' => 'Update Time',
        ];
    }
}
