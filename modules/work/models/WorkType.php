<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "work_type".
 *
 * @property integer $id
 * @property string $category
 * @property string $name_hi
 * @property string $name_en
 *
 * @property Work[] $works
 */
class WorkType extends \yii\db\ActiveRecord
{
	const MAINTENANCE=1;
	const SYSTEM_IMPROVEMENT=2;
	public static function categories()
	 {
	 	return
	 	[
	 	 self::MAINTENANCE=>'MAINTENANCE',
	 	 self::SYSTEM_IMPROVEMENT=>'System Improvement',

	 	 

	 	];
	 }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'string', 'max' => 5],
            [['name_hi', 'name_en'], 'string', 'max' => 255],
            [['name_en'],'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['work_type_id' => 'id']);
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
									
			case 'category':
			   return  $form->field($this,$attribute)->dropDownList($this->categories());
			    
			    break;
									
			case 'name_hi':
			   return  $form->field($this,$attribute)->textInput(['class'=>'hindiinput form-control']);
			    
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
									
			case 'category':
			   return self::categories()[$this->category];			    break;
									
			case 'name_hi':
			   return $this->name_hi;			    break;
									
			case 'name_en':
			   return $this->name_en;			    break;
			 
			default:
			break;
		  }
    }
	
}
