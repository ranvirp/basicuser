<?php
namespace app\modules\users;
class MyActiveRecord extends \yii\db\ActiveRecord
{
public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
               // 'value' => time(),
            ],
        ];
     }
}
?>