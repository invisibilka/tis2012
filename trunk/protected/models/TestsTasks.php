<?php

class Invitations extends CActiveRecord
{

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_tests_tasks';
    }

    public function rules()
    {
        return array( 

        );
    }

    public function relations()
    {
        return array( 
         'test'=>array(self::BELONGS_TO, 'Tests', 'test_id'),
         'task'=>array(self::BELONGS_TO, 'Tasks', 'task_id')
         );
    }

}