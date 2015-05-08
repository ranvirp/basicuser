<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\commands;


	
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "editMaster" permission
		if (!($editMasterData=$auth->getPermission('editMasterData')))
		{
           $editMasterData = $auth->createPermission('editMasterData');
           $editMasterData->description = 'Edits Master Data';
           $auth->add($editMasterData);
		}
        if (!($editWork=$auth->getPermission('editWork')))
		{
        $editWork = $auth->createPermission('editWork');
        $editWork->description = 'Edit Work';
        $auth->add($editWork);
		}
		if (!($operator=$auth->getRole('operator')))
		{
        // add "author" role and give this role the "createPost" permission
           $operator= $auth->createRole('operator');
		   $auth->add($operator);
		}
        
        $auth->addChild($operator, $editMasterData);
		$auth->addChild($operator, $editWork);
		
        

        
    }
	public function actionAssign($username,$role)
	{
		 $auth = Yii::$app->authManager;
		 print "Assigning role $role to $username \n";
		// print $username;
		 //exit;
		 $usermodel=\app\modules\users\models\User::find()->where(['username'=>$username])->one();
		if ($usermodel)  $userid=$usermodel->id;
		  else {print "username $username not found ..exiting\n";exit;}
		 $authRole=$auth->getRole($role);
		 if (!$authRole) 
		 {
		   $authRole= $auth->createRole($role);
		   $auth->add($authRole);
		 }
		 $auth->assign($authRole,$userid);
	}
	//public function actionAssigndesignation($username,$designation)
	
}

