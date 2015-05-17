<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "circle".
 *
 * @property integer $id
 * @property string $code
 * @property string $name_hi
 * @property string $name_en
 *
 * @property Division[] $divisions
 */
class Circle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'circle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 5],
            [['name_hi', 'name_en'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisions()
    {
        return $this->hasMany(Division::className(), ['circle_id' => 'id']);
    }
	/*
	*@return form of individual elements
	*/
	public function showForm($form,$attribute)
	{
		switch ($attribute)
		  {
		   
									
			case 'id':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'code':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'name_hi':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'name_en':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
			 
			default:
			break;
		  }
    }
	/*
	*@return form of individual elements
	*/
	public function showValue($attribute)
	{
	    $name='name_'.Yii::$app->language;
		switch ($attribute)
		  {
		   
									
			case 'id':
			   return $this->id;			    break;
									
			case 'code':
			   return $this->code;			    break;
									
			case 'name_hi':
			   return $this->name_hi;			    break;
									
			case 'name_en':
			   return $this->name_en;			    break;
			 
			default:
			break;
		  }
    }
	
}
