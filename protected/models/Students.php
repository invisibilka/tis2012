<?php
/**
 * User: M. Blascak
 * Date: 30.10.2012
 * Time: 16:03
 */
class Students extends CActiveRecord
{

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_students';
    }

    public function rules()
    {
        return array();
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id')

        );
    }

}