<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "hq".
 *
 * @property integer $id
 * @property string $name_en
 * @property string $name_hi
 * @property string $shortcode
 */
class Hq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_en', 'name_hi', 'shortcode'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'shortcode' => Yii::t('app', 'Shortcode'),
        ];
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
									
			case 'name_en':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'name_hi':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'shortcode':
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
									
			case 'name_en':
			   return $this->name_en;			    break;
									
			case 'name_hi':
			   return $this->name_hi;			    break;
									
			case 'shortcode':
			   return $this->shortcode;			    break;
			 
			default:
			break;
		  }
    }
	
}
