<?php

use yii\db\Schema;
use yii\db\Migration;

class m150501_183703_create_tables_reply_file extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
         $this->createTable('{{%reply}}', [
            'id' => Schema::TYPE_PK,
            'content_type' => Schema::TYPE_STRING . '(50) NOT NULL',
            'content_type_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'content'=>Schema::TYPE_TEXT,
            'attachments'=>Schema::TYPE_TEXT,
            'author_id'=>Schema::TYPE_INTEGER,
             'create_time'=>Schema::TYPE_INTEGER,
             'update_time'=>Schema::TYPE_INTEGER,
             'attentionof'=>Schema::TYPE_INTEGER,
                    ], $tableOptions);
                    $this->createTable('{{%file}}',[
'id'=>Schema::TYPE_PK,
'model_type'=>Schema::TYPE_STRING.'(500)',
'model_pk'=>Schema::TYPE_STRING.'(40)',
'size'=>Schema::TYPE_INTEGER,
'mime'=>Schema::TYPE_STRING.'(50)',
'url'=>Schema::TYPE_TEXT,
'path'=>Schema::TYPE_TEXT,
'filename'=>Schema::TYPE_TEXT,
'title'=>Schema::TYPE_STRING.'(1000)',
'uploaded_by'=>Schema::TYPE_INTEGER,
'uploaded_at'=>Schema::TYPE_INTEGER,
],$tableOptions);
    }

    public function down()
    {
        echo "m150501_183703_create_tables_reply_file cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
     $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
         $this->createTable('{{%reply}}', [
            'id' => Schema::TYPE_PK,
            'content_type' => Schema::TYPE_STRING . '(50) NOT NULL',
            'content_type_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'content'=>Schema::TYPE_TEXT,
            'attachments'=>Schema::TYPE_TEXT,
            'author_id'=>Schema::TYPE_INTEGER,
             'create_time'=>Schema::TYPE_INTEGER,
             'update_time'=>Schema::TYPE_INTEGER,
             'attentionof'=>Schema::TYPE_INTEGER,
                    ], $tableOptions);
    CREATE TABLE reply
(
  id integer NOT NULL DEFAULT nextval('replies_id_seq'::regclass),
  content_type character varying(50),
  content_type_id integer,
  content text,
  attachments text,
  create_time integer,
  author_id integer,
  update_time integer,
  attentionof integer,
  CONSTRAINT replies_pkey PRIMARY KEY (id)
)
$this->createTable('{{%file}}',[
'id'=>Schema::TYPE_PK,
'model_type'=>Schema::TYPE_STRING.'(500)',
'model_pk'=>Schema::TYPE_STRING.'(40)',
'size'=>Schema::TYPE_INTEGER,
'mime'=>Schema::TYPE_STRING.'(50)',
'url'=>Schema::TYPE_TEXT,
'path'=>Schema::TYPE_TEXT,
'filename'=>Schema::TYPE_TEXT,
'title'=>Schema::TYPE_STRING.'(1000)',
'uploaded_by'=>Schema::TYPE_INTEGER,
'uploaded_at'=>Schema::TYPE_INTEGER,
],$tableOptions);
CREATE TABLE file
(
  id serial NOT NULL,
  model_type character varying(20),
  model_pk character varying(20),
  size integer,
  height integer,
  width integer,
  mime character varying(50),
  url text,
  path text,
  filename text,
  title character varying(500),
  uploaded_by integer,
  uploaded_at integer,
    }
    
    public function safeDown()
    {
    }
    */
}
