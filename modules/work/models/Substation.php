<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "substation".
 *
 * @property integer $id
 * @property string $code
 * @property string $name_hi
 * @property string $name_en
 * @property integer $substation_type
 * @property string $voltageratio
 * @property string $mva
 * @property string $mvarmax
 * @property string $mvamax
 * @property string $notrf
 * @property string $capacity
 * @property integer $division_id
 * @property string $remarks
 *
 * @property Work[] $works
 * @property Division $division
 * @property Feeder[] $feeders
 */
class Substation extends \yii\db\ActiveRecord
{
    const KV440=0; 
           public static function substation_type() 
            { 
                 return [  
                 self::KV440 =>\Yii::t('app','440 KV'), 
                 ]; 
                 
            } 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'substation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['substation_type', 'division_id'], 'integer'],
            [['remarks'], 'string'],
            [['code'], 'string', 'max' => 5],
            [['name_hi', 'name_en', 'voltageratio', 'mva', 'mvarmax', 'mvamax', 'notrf', 'capacity'], 'string', 'max' => 255]
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
            'substation_type' => Yii::t('app', 'Substation Type'),
            'voltageratio' => Yii::t('app', 'Voltageratio'),
            'mva' => Yii::t('app', 'Mva'),
            'mvarmax' => Yii::t('app', 'Mvarmax'),
            'mvamax' => Yii::t('app', 'Mvamax'),
            'notrf' => Yii::t('app', 'Notrf'),
            'capacity' => Yii::t('app', 'Capacity'),
            'division_id' => Yii::t('app', 'Division ID'),
            'remarks' => Yii::t('app', 'Remarks'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['substation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivision()
    {
        return $this->hasOne(Division::className(), ['id' => 'division_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeders()
    {
        return $this->hasMany(Feeder::className(), ['substation_id' => 'id']);
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
									
			case 'substation_type':
			   return  $form->field($this,$attribute)->textInput();
                                        //dropDownList($this->substation_type(),['prompt'=>'None']);
			    break;
									
			case 'voltageratio':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'mva':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'mvarmax':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'mvamax':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'notrf':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'capacity':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'division_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Division::find()->asArray()->all(),"id","name_".Yii::$app->language),["prompt"=>"None.."]);
			    
			    break;
									
			case 'remarks':
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
									
			case 'substation_type':
			   return $this->substation_type;			    break;
									
			case 'voltageratio':
			   return $this->voltageratio;			    break;
									
			case 'mva':
			   return $this->mva;			    break;
									
			case 'mvarmax':
			   return $this->mvarmax;			    break;
									
			case 'mvamax':
			   return $this->mvamax;			    break;
									
			case 'notrf':
			   return $this->notrf;			    break;
									
			case 'capacity':
			   return $this->capacity;			    break;
									
			case 'division_id':
			   return Division::findOne($this->division_id)->$name;			    break;
									
			case 'remarks':
			   return $this->remarks;			    break;
			 
			default:
			break;
		  }
    }
	
}
