<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "division".
 *
 * @property integer $id
 * @property string $code
 * @property string $name_hi
 * @property string $name_en
 * @property integer $circle_id
 *
 * @property Work[] $works
 * @property Substation[] $substations
 * @property AeArea[] $aeAreas
 * @property JeArea[] $jeAreas
 * @property Circle $circle
 * @property MaterialRequirement[] $materialRequirements
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'division';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['circle_id'], 'integer'],
            [['code'], 'string', 'max' => 5],
            [['name_hi', 'name_en'], 'string', 'max' => 255],
            [['code','name_en'],'unique']
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
            'name_hi' => Yii::t('app', 'Name in Hindi'),
            'name_en' => Yii::t('app', 'Name in English'),
            'circle_id' => Yii::t('app', 'Circle ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['division_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubstations()
    {
        return $this->hasMany(Substation::className(), ['division_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAeAreas()
    {
        return $this->hasMany(AeArea::className(), ['division_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJeAreas()
    {
        return $this->hasMany(JeArea::className(), ['division_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCircle()
    {
        return $this->hasOne(Circle::className(), ['id' => 'circle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialRequirements()
    {
        return $this->hasMany(MaterialRequirement::className(), ['work_id' => 'id']);
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
									
			case 'circle_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Circle::find()->asArray()->all(),"id","name_".Yii::$app->language),["prompt"=>"None.."]);
			    
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
									
			case 'circle_id':
			   return Circle::findOne($this->circle_id)->$name;			    break;
			 
			default:
			break;
		  }
    }
	
}
