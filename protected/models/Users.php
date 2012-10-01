<?php
/**
 * User: V. Jurenka
 * Date: 1.10.2012
 * Time: 16:49
 */
class Users extends CActiveRecord
{

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_users';
    }

    public function rules()
    {
        return array(

        );
    }

    public function relations()
    {
        return array(

        );
    }

}
