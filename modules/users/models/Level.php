<?php
namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $id
 * @property integer $dept_id
 * @property string $name_hi
 * @property string $name_en
 * @property string $class_name
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property DesignationType[] $designationTypes
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
            [['dept_id', 'name_hi', 'name_en', 'class_name'], 'required'],
            [['dept_id'], 'integer'],
            [['name_hi', 'name_en'], 'string', 'max' => 255],
            [['class_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dept_id' => Yii::t('app', 'Dept ID'),
            'name_hi' => Yii::t('app', 'Name Hindi'),
            'name_en' => Yii::t('app', 'Name English'),
            'class_name' => Yii::t('app', 'Class Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignationTypes()
    {
        return $this->hasMany(DesignationType::className(), ['level_id' => 'id']);
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
									
			case 'dept_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Department::find()->asArray()->all(),"id","name_".Yii::$app->language),["prompt"=>"None.."]);
			    
			    break;
									
			case 'name_hi':
			   return  $form->field($this,$attribute)->textInput(['class'=>'hindiinput form-control']);
			    
			    break;
									
			case 'name_en':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'class_name':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'created_at':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'updated_at':
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
									
			case 'dept_id':
			   return Department::findOne($this->dept_id)->$name;			    break;
									
			case 'name_hi':
			   return $this->name_hi;			    break;
									
			case 'name_en':
			   return $this->name_en;			    break;
									
			case 'class_name':
			   return $this->class_name;			    break;
									
			case 'created_at':
			   return $this->created_at;			    break;
									
			case 'updated_at':
			   return $this->updated_at;			    break;
			 
			default:
			break;
		  }
    }
	
}
