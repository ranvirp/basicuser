<?php
namespace app\modules\work\models;

use Yii;

/**
 * This is the model class for table "work".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 * @property integer $agency_id
 * @property double $totvalue
 * @property integer $fundingdept_id
 * @property integer $work_type_code
 * @property string $address
 * @property double $gpslat
 * @property double $gpslong
 * @property integer $status
 * @property integer $scheme_id
 * @property integer $work_admin
 * @property string $gpslat1
 * @property string $gpslat2
 * @property integer $level2_id
 * @property integer $level1_id
 * @property string  $work_id
 * @property integer $phy
 * @property integer $fin
 * @property string $dateofprogress
 * @property string $remarks
 * @property integer $level3_id
 * @property integer $level4_id
 * @property Material[] $materials
 * @property WorkProgress[] $workProgresses
 * @property Agency $agency0
 * @property Department $dept
 * @property WorkType $workType
 * @property Scheme $scheme
 * @property Designation $workAdmin
 * @property MaterialRequirement[] $materialRequirements
 */
class Work extends WorkActiveRecord
{
    const PROPOSED =0;
    const FUND_NOT_RECEIVED =1;
	 const TENDER_NOT_ISSUED =2;
     const WORK_NOT_STARTED =3;
	 const WORK_IN_PROGRESS =4;
	 const WORK_COMPLETED =5;
	 protected $locationClasses=['\app\modules\work\models\Circle','\app\modules\work\models\Division',
    '\app\modules\work\models\SubStation',
    '\app\modules\work\models\Feeder'];
    protected $levels=['circle','division','substation','feeder'];
 	 public static function status()
	 {
		  return [ 
		  self::PROPOSED =>\Yii::t('app','Proposed'),
		  self::FUND_NOT_RECEIVED =>\Yii::t('app','Funds Not Received'),
		self::TENDER_NOT_ISSUED=>\Yii::t('app',"Tender Not Issued"),
		self::WORK_NOT_STARTED=>\Yii::t('app',"Work Not Started"),
		self::WORK_IN_PROGRESS=>\Yii::t('app',"Work In Progress"),
		self::WORK_COMPLETED=>\Yii::t('app',"Work Completed")];
	 }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_hi', 'name_en','remarks'], 'string'],
            [['agency_id', 'dept_id', 'work_type_id', 'status', 'scheme_id', 'work_admin', $this->level[0].'_id', $this->level[1].'_id',$this->level[2].'_id',$this->level[3].'_id'], 'integer'],
            [['work_id'], 'safe'],
            [['totvalue', 'gpslat', 'gpslong','phy','fin'], 'number'],
            [['address'], 'string', 'max' => 250],
			
			[['name_en','work_type_id','work_id','scheme_id','totvalue',$this->level[1].'_id'],'required'],
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
            'name_en' => Yii::t('app', 'Name in English'),
            'agency' => Yii::t('app', 'Agency'),
            'totvalue' => Yii::t('app', 'Total Value'),
            'fundingdept_id' => Yii::t('app', 'Funding Department'),
            'work_type_id' => Yii::t('app', 'Work Type'),
            'address' => Yii::t('app', 'Address'),
            'gpslat' => Yii::t('app', 'Latitude'),
            'gpslong' => Yii::t('app', 'Longitude'),
            'status' => Yii::t('app', 'Status'),
            'scheme_id' => Yii::t('app', 'Scheme'),
            'work_admin' => Yii::t('app', 'Work Admin'),
            'substation_id' => Yii::t('app', 'Substation '),
            'division_id' => Yii::t('app', 'Division'),
            'work_id' => Yii::t('app', 'Work'),
            'sanction_id'=>Yii::t('app','Sanction Id'),
            'phy' => Yii::t('app', 'Physical Progress'),
            'fin' => Yii::t('app', 'Financial Progress'),
            'dateofprogress' => Yii::t('app', 'Date of Progress'),
            'remarks' => Yii::t('app', 'Remarks'),
            'feeder_id' => Yii::t('app', 'Feeder '),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenders()
    {
        return $this->hasMany(Tender::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkProgresses()
    {
        return $this->hasMany(WorkProgress::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgency0()
    {
        return $this->hasOne(Agency::className(), ['id' => 'agency']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Department::className(), ['id' => 'dept_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkType()
    {
        return $this->hasOne(WorkType::className(), ['id' => 'work_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheme()
    {
        return $this->hasOne(Scheme::className(), ['id' => 'scheme_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkAdmin()
    {
        return $this->hasOne(Designation::className(), ['id' => 'work_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubstation()
    {
        return $this->hasOne(Substation::className(), ['id' => 'substation_id']);
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
									
			case 'name_hi':
			   return  $form->field($this,$attribute)->textInput(['class'=>'form-control hindiinput']);
			    
			    break;
									
			case 'name_en':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'agency':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Agency::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
			    break;
									
			case 'dateofsanction':
			   return  
			             $form->field($this, "dateofsanction")->widget(\kartik\widgets\DatePicker::classname(), [
'options' => ['placeholder' => 'Enter'. $this->attributeLabels()["dateofsanction"]." ..."],
'pluginOptions' => [
'autoclose'=>true
]
]); 			    
			    break;
									
			case 'dateoffundsreceipt':
			   return  
			             $form->field($this, "dateoffundsreceipt")->widget(\kartik\widgets\DatePicker::classname(), [
'options' => ['placeholder' => 'Enter'. $this->attributeLabels()["dateoffundsreceipt"]." ..."],
'pluginOptions' => [
'autoclose'=>true
]
]); 			    
			    break;
									
			case 'dateofstart':
			   return  
			             $form->field($this, "dateofstart")->widget(\kartik\widgets\DatePicker::classname(), [
'options' => ['placeholder' => 'Enter'. $this->attributeLabels()["dateofstart"]." ..."],
'pluginOptions' => [
'autoclose'=>true
]
]); 			    
			    break;
									
			case 'totvalue':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'dept_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Department::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
			    break;
									
			case 'work_type_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(WorkType::find()->asArray()->all(),"id","name_".Yii::$app->language),['prompt'=>'None'
			   
			   //,'onChange'=>'this.form.submit()'
			   ]
			   );
			    
			    break;
									
			case 'address':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'gpslat':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'gpslong':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'loc':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'status':
			   return  $form->field($this,$attribute)->dropDownList($this->status(),['prompt'=>'None']);
			    
			    break;
									
			case 'scheme_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Scheme::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
			    break;
									
			case 'work_admin':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Designation::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
			    break;
									
			case 'fromloc':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'toloc':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'substation_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Substation::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
			    break;
									
			case 'division_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(Division::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
			    break;
									
			case 'package_no':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'work_id':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'phy':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'fin':
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
									
			case 'feeder_id':
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
									
			case 'agency':
			   return Agency::findOne($this->agency)->$name;			    break;
									
			case 'dateofsanction':
			   return $this->dateofsanction;			    break;
									
			case 'dateoffundsreceipt':
			   return $this->dateoffundsreceipt;			    break;
									
			case 'dateofstart':
			   return $this->dateofstart;			    break;
									
			case 'totvalue':
			   return $this->totvalue;			    break;
									
			case 'dept_id':
			   return Department::findOne($this->dept_id)->$name;			    break;
									
			case 'work_type_id':
			   return WorkType::findOne($this->work_type_id)->$name;			    break;
									
			case 'address':
			   return $this->address;			    break;
									
			case 'gpslat':
			   return $this->gpslat;			    break;
									
			case 'gpslong':
			   return $this->gpslong;			    break;
									
			case 'loc':
			   return $this->loc;			    break;
									
			case 'status':
			   return $this->status;			    break;
									
			case 'scheme_id':
			   return Scheme::findOne($this->scheme_id)->$name;			    break;
									
			case 'work_admin':
			   return Designation::findOne($this->work_admin)->$name;			    break;
									
			case 'fromloc':
			   return $this->fromloc;			    break;
									
			case 'toloc':
			   return $this->toloc;			    break;
									
			case 'substation_id':
			   return Substation::findOne($this->substation_id)->$name;			    break;
									
			case 'division_id':
			   return Division::findOne($this->division_id)->$name;			    break;
									
			case 'package_no':
			   return $this->package_no;			    break;
									
			case 'work_id':
			   return $this->work_id;			    break;
									
			case 'phy':
			   return $this->phy;			    break;
									
			case 'fin':
			   return $this->fin;			    break;
									
			case 'dateofprogress':
			   return $this->dateofprogress;			    break;
									
			case 'remarks':
			   return $this->remarks;			    break;
									
			case 'feeder_id':
			   return $this->feeder_id;			    break;
			 
			default:
			break;
		  }
    }
public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
      $designation=\app\modules\users\models\Designation::find()->where(['officer_userid'=>Yii::$app->user->id])->one();
		
       if ($designation->getLevel()=="Division")
			{
				return $this->division_id==$designation->level->id;
			}
			else if ($designation->getLevel()=="Circle")
			{
					$ddd= \yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->where(['circle_id'=>$designation->level->id])->all(),'id');
				    return in_array($this->division_id,$ddd);
			}
			else if ($designation->getLevel()=="Hq")
			{
					$ddd= \yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->all(),'id');
				    return in_array($this->division_id,$ddd);
			
			} 
			return true;
    } else {
        return false;
    }
}
}
