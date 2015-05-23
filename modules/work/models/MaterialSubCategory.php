<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "material_subcategory".
 *
 * @property integer $id
 * @property integer $material_category_id
 * @property string $material_subcategory
 *
 * @property MaterialCategory $materialCategory
 * @property MaterialType[] $materialTypes
 */
class MaterialSubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_subcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'material_subcategory'], 'required'],
            [['id', 'material_category_id'], 'integer'],
            [['material_subcategory'], 'string', 'max' => 255],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'material_category_id' => Yii::t('app', 'Material Category ID'),
            'material_subcategory' => Yii::t('app', 'Material Subcategory'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCategory()
    {
        return $this->hasOne(MaterialCategory::className(), ['id' => 'material_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialTypes()
    {
        return $this->hasMany(MaterialType::className(), ['material_subcategory_id' => 'id']);
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
									
			case 'material_category_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(MaterialCategory::find()->asArray()->all(),"id","name_".Yii::$app->language),["prompt"=>"None.."]);
			    
			    break;
									
			case 'material_subcategory':
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
									
			case 'material_category_id':
			   return MaterialCategory::findOne($this->material_category_id)->$name;			    break;
									
			case 'material_subcategory':
			   return $this->material_subcategory;			    break;
			 
			default:
			break;
		  }
    }
	
}
