<?php
/**
 * User: M. Blascak
 * Date: 30.10.2012
 * Time: 16:20
 */
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
            'students'=>array(self::MANY_MANY, 'Students', 'students_lists(list_id, student_id)')
         );
    }

}