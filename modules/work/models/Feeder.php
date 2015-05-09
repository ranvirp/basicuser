<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "feeder".
 *
 * @property integer $id
 * @property string $code
 * @property string $name_hi
 * @property string $name_en
 * @property string $description
 * @property integer $substation_id
 * @property string $pwtrfcty
 * @property string $pwtrfid
 * @property integer $typeofconductor
 * @property string $peakdemand
 * @property string $notrf
 * @property string $capacity
 * @property string $remarks
 *
 * @property Work[] $works
 * @property Substation $substation
 */
class Feeder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feeder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['substation_id', 'typeofconductor'], 'integer'],
            [['remarks'], 'string'],
            [['code'], 'string', 'max' => 5],
            [['name_hi', 'name_en', 'description', 'pwtrfcty', 'pwtrfid', 'peakdemand', 'notrf', 'capacity'], 'string', 'max' => 255]
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
            'description' => Yii::t('app', 'Description'),
            'substation_id' => Yii::t('app', 'Substation ID'),
            'pwtrfcty' => Yii::t('app', 'Pwtrfcty'),
            'pwtrfid' => Yii::t('app', 'Pwtrfid'),
            'typeofconductor' => Yii::t('app', 'Typeofconductor'),
            'peakdemand' => Yii::t('app', 'Peakdemand'),
            'notrf' => Yii::t('app', 'Notrf'),
            'capacity' => Yii::t('app', 'Capacity'),
            'remarks' => Yii::t('app', 'Remarks'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['feeder_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubstation()
    {
        return $this->hasOne(Substation::className(), ['id' => 'substation_id']);
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
									
			case 'description':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'substation_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Substation::find()->asArray()->all(),"id","name_".Yii::$app->language),["prompt"=>"None.."]);
			    
			    break;
									
			case 'pwtrfcty':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'pwtrfid':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'typeofconductor':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'peakdemand':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'notrf':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'capacity':
			   return  $form->field($this,$attribute)->textInput();
			    
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
									
			case 'description':
			   return $this->description;			    break;
									
			case 'substation_id':
			   return Substation::findOne($this->substation_id)->$name;			    break;
									
			case 'pwtrfcty':
			   return $this->pwtrfcty;			    break;
									
			case 'pwtrfid':
			   return $this->pwtrfid;			    break;
									
			case 'typeofconductor':
			   return $this->typeofconductor;			    break;
									
			case 'peakdemand':
			   return $this->peakdemand;			    break;
									
			case 'notrf':
			   return $this->notrf;			    break;
									
			case 'capacity':
			   return $this->capacity;			    break;
									
			case 'remarks':
			   return $this->remarks;			    break;
			 
			default:
			break;
		  }
    }
	
}
