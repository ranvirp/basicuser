<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "material_category".
 *
 * @property integer $id
 * @property string $material_category
 *
 * @property MaterialSubcategory[] $materialSubcategories
 */
class MaterialCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'material_category'], 'required'],
            [['id'], 'integer'],
            [['material_category'], 'string', 'max' => 255],
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
            'material_category' => Yii::t('app', 'Material Category'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialSubcategories()
    {
        return $this->hasMany(MaterialSubcategory::className(), ['material_category_id' => 'id']);
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
									
			case 'material_category':
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
									
			case 'material_category':
			   return $this->material_category;			    break;
			 
			default:
			break;
		  }
    }
	
}
