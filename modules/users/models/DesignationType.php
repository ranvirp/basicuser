<?php
namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "designation_type".
 *
 * @property integer $id
 * @property integer $level_id
 * @property string $name_hi
 * @property string $name_en
 * @property string $shortcode
 *
 * @property Level $level
 */
class DesignationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designation_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id'], 'integer'],
            [['name_hi', 'name_en'], 'string', 'max' => 50],
            [['shortcode'], 'string', 'max' => 10]
        ];
    }
/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'level_id' => Yii::t('app', 'Level ID'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
            'shortcode' => Yii::t('app', 'Shortcode'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Level::className(), ['id' => 'level_id']);
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
									
			case 'level_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Level::find()->asArray()->all(),"id","name_".Yii::$app->language),["prompt"=>"None.."]);
			    
			    break;
									
			case 'name_hi':
			   return  $form->field($this,$attribute)->textInput();
			    
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
									
			case 'level_id':
			   return Level::findOne($this->level_id)->$name;			    break;
									
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
    public function getLevelObj()
    {
     return Level::findOne($this->level_id);
    }
	
}
