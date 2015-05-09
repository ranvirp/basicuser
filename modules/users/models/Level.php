<?php
namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $id
 * @property string $class_name
 * @property integer $dept_id
 * @property string $name_hi
 * @property string $name_en
 *
 * @property Department $dept
 */
class Level extends \app\modules\users\MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_id'], 'integer'],
            [['name_hi', 'name_en'], 'string'],
            [['class_name'], 'string', 'max' => 50]
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
            'class_name' => Yii::t('app', 'Class Name'),
            'dept_id' => Yii::t('app', 'Dept ID'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Department::className(), ['id' => 'dept_id']);
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
									
			case 'class_name':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'dept_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Department::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
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
									
			case 'class_name':
			   return $this->class_name;			    break;
									
			case 'dept_id':
			   return Department::findOne($this->dept_id)->$name;			    break;
									
			case 'name_hi':
			   return $this->name_hi;			    break;
									
			case 'name_en':
			   return $this->name_en;			    break;
			 
			default:
			break;
		  }
    }
	
}
