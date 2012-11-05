<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Vladimir
 * Date: 31.10.2012
 * Time: 13:49
 * To change this template use File | Settings | File Templates.
 */
class Tasks extends CActiveRecord
{

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_tasks';
    }

    public function rules()
    {
        return array(

        );
    }

    public function search(){
        $criteria = new CDbCriteria();
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'keywords' => array(self::MANY_MANY, 'Keywords', 'tis_tasks_keywords(task_id, keyword_id)'),
            'comments' => array(self::HAS_MANY, 'Comments', 'task_id'),
            'ratings' => array(self::HAS_MANY, 'Ratings', 'task_id'),
            'tests' => array(self::MANY_MANY, 'Test', 'tis_tests_tasks(task_id, test_id)'),
            'tests_tasks' => array(self::HAS_MANY, 'TestsTasks', 'task_id'),
        );
    }
}
