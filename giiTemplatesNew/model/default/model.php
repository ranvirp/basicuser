<?php
/**
 * This is the template for generating the model class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

echo "<?php\n";
?>
<?php $relationsFk=$generator->generateRelationsArray();?>
namespace <?= $generator->ns ?>;

use Yii;

/**
 * This is the model class for table "<?= $generator->generateTableName($tableName) ?>".
 *
<?php foreach ($tableSchema->columns as $column): ?>
 * @property <?= "{$column->phpType} \${$column->name}\n" ?>
<?php endforeach; ?>
<?php if (!empty($relations)): ?>
 *
<?php foreach ($relations as $name => $relation): ?>
 * @property <?= $relation[1] . ($relation[2] ? '[]' : '') . ' $' . lcfirst($name) . "\n" ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?= $className ?> extends <?= '\\' . ltrim($generator->baseClass, '\\') . "\n" ?>
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '<?= $generator->generateTableName($tableName) ?>';
    }
<?php if ($generator->db !== 'db'): ?>

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('<?= $generator->db ?>');
    }
<?php endif; ?>

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [<?= "\n            " . implode(",\n            ", $rules) . "\n        " ?>];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
<?php foreach ($labels as $name => $label): ?>
            <?= "'$name' => " . $generator->generateString($label) . ",\n" ?>
<?php endforeach; ?>
        ];
    }
<?php foreach ($relations as $name => $relation): ?>

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get<?= $name ?>()
    {
        <?= $relation[0] . "\n" ?>
    }
<?php endforeach; ?>
	/*
	*@return form of individual elements
	*/
	public function showForm($form,$attribute)
	{
		switch ($attribute)
		  {
		   
			<?php foreach ($tableSchema->columns as $column):?>
			<?php $attribute=$column->name;?>
			
			case '<?=$attribute?>':
			   <?php if (isset($relationsFk[$tableName][$attribute]))
			   {
				  echo 'return '.' $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map('
				   . $relationsFk[$tableName][$attribute]['class'].'::find()->asArray()->all()'
					  .',"'.$relationsFk[$tableName][$attribute]['table']->primaryKey[0].'","name_".Yii::$app->language),["prompt"=>"None.."]);'."\n";
					  
			   }
			   else
			      if ($column->dbType=='date') 
			         {
			         echo 'return  '.'
			             $form->field($this, "'.$attribute.'")->widget(\kartik\widgets\DatePicker::classname(), [
\'options\' => [\'placeholder\' => \'Enter\'.'.' $this->attributeLabels()["'.$attribute.'"]." ..."],
\'pluginOptions\' => [
\'autoclose\'=>true
]
]); ';
			          }
			        else 
				   echo 'return '.' $form->field($this,$attribute)->textInput();'."\n";
			    ?>
			    
			    break;
			<?php endforeach;?> 
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
		   
			<?php foreach ($tableSchema->columns as $column):?>
			<?php $attribute=$column->name;?>
			
			case '<?=$attribute?>':
			   <?php if (isset($relationsFk[$tableName][$attribute]))
			   {
				  echo 'return '. $relationsFk[$tableName][$attribute]['class'].'::findOne($this->'.$attribute.')->$name;';
				
					  
			   }
			   else
				   echo 'return $this->'.$attribute.';';
			    ?>
			    break;
			<?php endforeach;?> 
			default:
			break;
		  }
    }
	
}
