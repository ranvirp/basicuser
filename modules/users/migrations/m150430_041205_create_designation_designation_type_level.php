<?php

use yii\db\Schema;
use yii\db\Migration;

class m150430_041205_create_designation_designation_type_level extends Migration
{
    public function safeUp()
    {
      $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
         $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32)',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . '',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        $user = new \app\modules\users\models\User;
        $user->username='admin';
        $user->setPassword('admin');
        $user->save();
        $this->createTable('{{%designation}}', [
            'id' => Schema::TYPE_PK,
            'designation_type_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'level_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'officer_name_hi' => Schema::TYPE_STRING . '(100) ',
            'officer_name_en' => Schema::TYPE_STRING . '(32) ',
            'officer_mobile' => Schema::TYPE_STRING . '(12) ',
            'officer_mobile1' => Schema::TYPE_STRING . '(12) ',
            'officer_email' => Schema::TYPE_STRING . '(32) ',
            'officer_userid'=>Schema::TYPE_INTEGER.' NOT NULL',
            'name_hi' => Schema::TYPE_STRING . ' NOT NULL',
            'name_en' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        $this->createTable('{{%designation_type}}', [
            'id' => Schema::TYPE_PK,
            'level_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'name_hi' => Schema::TYPE_STRING . ' NOT NULL',
            'name_en' => Schema::TYPE_STRING . ' NOT NULL',
            'shortcode' => Schema::TYPE_STRING . '(10) NOT NULL',
            
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
         $this->createTable('{{%level}}', [
            'id' => Schema::TYPE_PK,
            'dept_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'name_hi' => Schema::TYPE_STRING . ' NOT NULL',
            'name_en' => Schema::TYPE_STRING . ' NOT NULL',
            'class_name' => Schema::TYPE_STRING . '(50) NOT NULL',
            
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
         $this->createTable('{{%department}}', [
            'id' => Schema::TYPE_PK,
            'name_hi' => Schema::TYPE_STRING . ' NOT NULL',
            'name_en' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
         $this->createTable('{{%websitemanagement}}', [
            'id' => Schema::TYPE_PK,
            'name_hi' => Schema::TYPE_STRING . ' NOT NULL',
            'name_en' => Schema::TYPE_STRING . ' NOT NULL',
            ],$tableOptions);
        $web=new app\modules\users\models\WebsiteManagement;
        $web->name_en='Web Manager';
        $web->name_hi='Web Manager';
        $web->save();
        $dept=new app\modules\users\models\Department;
        $dept->name_hi='WebAdministration';
        $dept->name_en='WebAdministration';
        $dept->save();
        $level=new app\modules\users\models\Level;
        $level->dept_id=1;
        $level->name_hi='Web Administration';
        $level->name_en='Web Administration';
        $level->class_name='app\modules\users\models\WebsiteManagement';
        $level->save();
        $dt=new \app\modules\users\models\DesignationType;
        $dt->level_id=1;
        $dt->shortcode='webadmin';
        $dt->name_en='Web Administrator';
        $dt->name_hi='Web Administrator';
        $dt->save();
        $d=new \app\modules\users\models\Designation;
        $d->designation_type_id=1;
        $d->name_en='Web Administrator';
        $d->name_hi='Web Administrator';
        $d->officer_userid=1;
        $d->level_id=1;
        $d->save();
         $authManager=Yii::$app->authManager;
         if ($authManager)
          {
           $webadminrole=$authManager->createRole('webadmin');
           $authManager->add($webadminrole);
           
           $permissions=['edit','delete','create','view','index','update'];
           $tables=['department','level','designationtype','designation'];
           foreach($tables as $table)
            {
              foreach($permissions as $permission)
                {
                  if (!($authpermission=$authManager->getPermission($table.$permission)))
                     {
                       $authpermission=$authManager->createPermission($table.$permission);
                       $authpermission->description=$permission.' of controller '.$table;
                       $authManager->add($authpermission);
                     }
                    $authManager->addChild($webadminrole,$authpermission);
                }
            }
            $authManager->assign($webadminrole,1);
          }
        //addForeignKey( $name, $table, $columns, $refTable, $refColumns, $delete = null, $update = null )
      $this->addForeignKey('designation_designation_type_fkey','{{%designation}}','designation_type_id','{{%designation_type}}','id');
      
      $this->addForeignKey('designation_type_level_fkey','{{%designation_type}}','level_id','{{%level}}','id');
      $this->addForeignKey('level_department_fkey','{{%level}}','dept_id','{{%department}}','id');
      
    }

    public function safeDown()
    {
        $this->dropForeignKey('designation_designation_type_fkey','{{%designation}}');
        $this->dropForeignKey('designation_type_level_fkey','{{%designation_type}}');
        $this->dropForeignKey('level_department_fkey','{{%level}}');
         $this->dropTable('{{%designation}}');
         $this->dropTable('{{%designation_type}}');
         $this->dropTable('{{%level}}');
         $this->dropTable('{{%department}}');
         $this->dropTable('{{%websitemanagement}}');
         $this->dropTable('{{user}}');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
