<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\work\models;
use Yii;

/**
 * Description of KescoActiveRecord
 *
 * @author mac
 */
class KescoActiveRecord  extends \yii\db\ActiveRecord{
	//put your code here
	    /**
     * @inheritdoc
     * @return CommentQuery
     */
    public static function find()
    {
        //find designation of the User
		$designation=\app\modules\masterdata\models\Designation::find()->where(['officer_userid'=>Yii::$app->user->id])->one();
		//$desigtype=\app\modules\masterdata\models\DesignationType::findOne($designation->designation_type_id);
		//print_r($designation->designationType->level->name_en);
		//exit;
		$levelname=$designation->designationType->level->name_en;
		
		 $query=new \yii\db\ActiveQuery(get_called_class());
		 if (!$designation) 
		    return $query->andWhere('1=0');
		if (get_called_class()=="app\models\Work")
		{
			if ($levelname=="JEArea")
			{
				$sss= \yii\helpers\ArrayHelper::map(\app\models\Substation::find()->asArray()->where(['je'=>$designation])->all(),'id','id');
				return $query->andWhere(['substation_id'=>$sss]);
			}
			else if ($levelname=="Division")
			{
				return $query->andWhere(['division_id'=>$designation->level->id]);
			}
			else if ($levelname=="Circle")
			{
				$cmd=Yii::$app->db->createCommand('select id from division where circle_id=:circle_id',[':circle_id'=>$designation->level_id]);
				    $cmd->fetchMode=\PDO::FETCH_COLUMN;
					 $ddd=$cmd->queryAll();
				        return $query->andWhere(['division_id'=>$ddd]);
			
			}
			else if ($levelname=="Hq")
			{
				 $cmd=Yii::$app->db->createCommand('select id from division' );
					 $cmd->fetchMode=\PDO::FETCH_COLUMN;
					 $ddd=$cmd->queryAll();
				       return $query->andWhere(['division_id'=>$ddd]);
			
			}
			else return $query;
		}
		else if (get_called_class()=="app\models\Division")
		{
		//  $designationtype=\app\modules\masterdata\models\DesignationType::findOne($designation->designation_type_id);
		//exit;
		  if (Yii::$app->user->can('admin')) return $query;
		  else 
		  if ($levelname=="Division")
			{
				return $query->andWhere(['id'=>$designation->level->id]);
			}
			else if ($levelname=="Circle")
			{
					//$ddd= \yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->where(['circle_id'=>$designation->level->id])->all(),'id','id');
				    $cmd=Yii::$app->db->createCommand('select id from division where circle_id=:circle_id',[':circle_id'=>$designation->level_id]);
				    $cmd->fetchMode=\PDO::FETCH_COLUMN;
					 $ddd=$cmd->queryAll();
				    return $query->andWhere(['id'=>$ddd]);
			
			}
			else if ($levelname=="Hq")
			{
					 $cmd=Yii::$app->db->createCommand('select id from division' );
					 $cmd->fetchMode=\PDO::FETCH_COLUMN;
					 $ddd=$cmd->queryAll();
				   
					//print_r($ddd);
				    //exit;
				    return $query->andWhere(['id'=>$ddd]);
			
			}
			else return $query;
			
			
		}
		else return $query;

    }
}
