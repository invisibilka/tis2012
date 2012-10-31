<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Katka
 * Date: 31.10.2012
 * Time: 13:49
 * To change this template use File | Settings | File Templates.
 */
class Keywords extends CActiveRecord
{

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_keywordss';
    }

    public function rules()
    {
        return array(

        );
    }

    public function relations()
    {
        return array(
            'tasks' => array(self::MANY_MANY, 'Tasks', 'tis_tasks_keywords(keyword_id,task_id )'),

        );
    }
}
