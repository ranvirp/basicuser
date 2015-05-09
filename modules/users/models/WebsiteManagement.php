<?php

namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "WebsiteManagement".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 * 
 */
class WebsiteManagement extends yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'websitemanagement';
    }
    }
?>