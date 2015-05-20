<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "material_requirement".
 *
 * @property integer $id
 * @property integer $work_id
 * @property integer $material_type_id
 * @property double $qty
 * @property double $value
 * @property double $issuedqty
 *
 * @property MaterialType $materialType
 * @property Division $work
 */
class MaterialRequirement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_requirement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'material_type_id'], 'integer'],
            [['qty', 'value', 'issuedqty'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'work_id' => Yii::t('app', 'Work ID'),
            'material_type_id' => Yii::t('app', 'Material Type ID'),
            'qty' => Yii::t('app', 'Qty'),
            'value' => Yii::t('app', 'Value'),
            'issuedqty' => Yii::t('app', 'Issuedqty'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialType()
    {
        return $this->hasOne(MaterialType::className(), ['id' => 'material_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Division::className(), ['id' => 'work_id']);
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
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Division::find()->asArray()->all(),"id","name_".Yii::$app->language),["prompt"=>"None.."]);
			    
			    break;
									
			case 'material_type_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(MaterialType::find()->asArray()->all(),"id","name_".Yii::$app->language),["prompt"=>"None.."]);
			    
			    break;
									
			case 'qty':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'value':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'issuedqty':
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
			   return Division::findOne($this->work_id)->$name;			    break;
									
			case 'material_type_id':
			   return MaterialType::findOne($this->material_type_id)->$name;			    break;
									
			case 'qty':
			   return $this->qty;			    break;
									
			case 'value':
			   return $this->value;			    break;
									
			case 'issuedqty':
			   return $this->issuedqty;			    break;
			 
			default:
			break;
		  }
    }
	
}
