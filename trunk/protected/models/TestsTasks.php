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
         'test'=>array(self::HAS_MANY, 'Tests', 'test_id'),
         'task'=>array(self::HAS_MANY, 'Tasks', 'task_id')
         );
    }

}

?>