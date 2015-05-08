<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "material_type".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 * @property double $unitcost_1314
 * @property double $unitcost_1415
 * @property double $unitcost_1516
 * @property string $unit_type
 *
 * @property Material[] $materials
 */
class MaterialType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unitcost_1314', 'unitcost_1415', 'unitcost_1516'], 'number'],
            [['name_hi', 'name_en'], 'string', 'max' => 1000],
            [['unit_type'], 'string', 'max' => 5]
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
            'name_en' => Yii::t('app', 'Name'),
            'unitcost_1314' => Yii::t('app', 'Unit Cost Year 2013-14'),
            'unitcost_1415' => Yii::t('app', 'Unit Cost 2014-15'),
            'unitcost_1516' => Yii::t('app', 'Unit Cost 2015-16'),
            'unit_type' => Yii::t('app', 'Unit Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['type' => 'id']);
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
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'name_en':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'unitcost_1314':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'unitcost_1415':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'unitcost_1516':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'unit_type':
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
									
			case 'unitcost_1314':
			   return $this->unitcost_1314;			    break;
									
			case 'unitcost_1415':
			   return $this->unitcost_1415;			    break;
									
			case 'unitcost_1516':
			   return $this->unitcost_1516;			    break;
									
			case 'unit_type':
			   return $this->unit_type;			    break;
			 
			default:
			break;
		  }
    }
	
}
