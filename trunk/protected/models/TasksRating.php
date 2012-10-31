<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Katka
 * Date: 31.10.2012
 * Time: 14:09
 * To change this template use File | Settings | File Templates.
 */
class TasksRating extends CActiveRecord
{

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_tasks_rating';
    }

    public function rules()
    {
        return array(

        );
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'tasks' => array(self::BELONGS_TO, 'Tasks', 'task_id'),

        );
    }
}
