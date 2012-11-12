<?php
/**
 * With love from
 * M. Oravec 
 */
class Tests extends CActiveRecord {

	static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_tests';
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
			'tasks' => array(self::MANY_MANY, 'Task', 'tis_tests_tasks(task_id, test_id)'),
            'tests_tasks' => array(self::HAS_MANY, 'TestsTasks', 'test_id')
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

}