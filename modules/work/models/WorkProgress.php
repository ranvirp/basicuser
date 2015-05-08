<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "work_progress".
 *
 * @property integer $id
 * @property integer $work_id
 * @property integer $physical
 * @property integer $financial
 * @property string $dateofprogress
 * @property string $remarks
 * @property double $expenditure
 *
 * @property Work $work
 */
class WorkProgress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'physical', 'financial'], 'integer'],
            [['dateofprogress'], 'safe'],
            [['remarks'], 'string'],
            [['expenditure'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'work_id' => Yii::t('app', 'Work'),
            'physical' => Yii::t('app', 'Physical'),
            'financial' => Yii::t('app', 'Financial'),
            'dateofprogress' => Yii::t('app', 'Date of Progress'),
            'remarks' => Yii::t('app', 'Remarks'),
            'expenditure' => Yii::t('app', 'Expenditure'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
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
									
			case 'work_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Work::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
			    break;
									
			case 'physical':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'financial':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'dateofprogress':
			   return  
			             $form->field($this, "dateofprogress")->widget(\kartik\widgets\DatePicker::classname(), [
'options' => ['placeholder' => 'Enter'. $this->attributeLabels()["dateofprogress"]." ..."],
'pluginOptions' => [
'autoclose'=>true
]
]); 			    
			    break;
									
			case 'remarks':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'expenditure':
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
									
			case 'work_id':
			   return Work::findOne($this->work_id)->$name;			    break;
									
			case 'physical':
			   return $this->physical;			    break;
									
			case 'financial':
			   return $this->financial;			    break;
									
			case 'dateofprogress':
			   return $this->dateofprogress;			    break;
									
			case 'remarks':
			   return $this->remarks;			    break;
									
			case 'expenditure':
			   return $this->expenditure;			    break;
			 
			default:
			break;
		  }
    }
	
}
