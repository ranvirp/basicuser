<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "circle".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 * @property string $code
 *
 * @property Division[] $divisions
 * @property Substation[] $substations
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
            [['name_hi', 'name_en'], 'string', 'max' => 200],
            [['code'], 'string', 'max' => 7],
             [['code','name_hi','name_en'],'required'],
             [['code','name_en'],'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_hi' => Yii::t('app', 'Name in Hindi'),
            'name_en' => Yii::t('app', 'Name English'),
            'code' => Yii::t('app', 'Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisions()
    {
        return $this->hasMany(Division::className(), ['circle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubstations()
    {
        return $this->hasMany(Substation::className(), ['circle_id' => 'id']);
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
									
			case 'name_hi':
			   return  $form->field($this,$attribute)->textInput(['class'=>'hindiinput form-control']);
			    
			    break;
									
			case 'name_en':
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
									
			case 'name_hi':
			   return $this->name_hi;			    break;
									
			case 'name_en':
			   return $this->name_en;			    break;
									
			case 'shortcode':
			   return $this->shortcode;			    break;
			 
			default:
			break;
		  }
    }
	
}
