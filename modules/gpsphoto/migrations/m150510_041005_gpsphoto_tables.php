<?php

use yii\db\Schema;
use yii\db\Migration;

class m150510_041005_gpsphoto_tables extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
         $this->createTable('{{%photo}}', [
            'id'=>Schema::TYPE_PK,
            'bwid'=>Schema::TYPE_STRING,
            'title'=>Schema::TYPE_TEXT,
            'height'=>Schema::TYPE_INTEGER,
            'width'=>Schema::TYPE_INTEGER,
            'mime'=>Schema::TYPE_STRING,
            'size'=>Schema::TYPE_INTEGER,
            'url'=>Schema::TYPE_STRING,
            'path'=>Schema::TYPE_STRING,
            'filename'=>Schema::TYPE_STRING,
            'gpslat'=>Schema::TYPE_DOUBLE,
            'gpslong'=>Schema::TYPE_DOUBLE,
            'approved'=>Schema::TYPE_INTEGER,
            'imei'=>Schema::TYPE_STRING,
            'mobileno'=>Schema::TYPE_STRING,
            'devicesoftware'=>Schema::TYPE_STRING,
            'created_at'=>Schema::TYPE_STRING,
            'created_by'=>Schema::TYPE_INTEGER,
            ],$tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%photo}}');
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
