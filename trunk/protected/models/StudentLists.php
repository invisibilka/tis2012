<?php

class StudentLists extends CActiveRecord
{

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_student_lists';
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
            'students'=>array(self::MANY_MANY, 'Students', 'tis_students_lists(list_id, student_id)')
         );
    }

}

?>