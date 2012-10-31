<?php
/**
 * With love from
 * M. Oravec 
 */
class TasksComments extends CActiveRecord {

	static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_tasks_comments';
    }

    public function rules()
    {
        return array( 

        );
    }

    public function relations()
    {
        return array( 
            'user'=>array(self::BELONGS_TO, 'Users', 'user_id'),
            'task'=>array(self::BELONGS_TO, 'Tasks', 'task_id')
         );
    }

}