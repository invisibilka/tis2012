<?php
/**
 * Reprezentuje pouzivatelov v databaze.
 * @author V. Jurenka
 */
class Users extends CActiveRecord
{
    public $new_password;

    public $new_password2;

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
            array('new_password', 'compare', 'compareAttribute'=>'new_password2'),
            array('email', 'unique'),
            array('email', 'email'),
            array('about', 'length', 'max' => 3000),
            array('new_password, new_password2', 'length', 'max' => 64),
            array('permissions', 'boolean'),
        );
    }

    public function relations()
    {
        return array(
            'students' => array(self::HAS_MANY, 'Students', 'user_id'),
            'tasks' => array(self::HAS_MANY, 'Tasks', 'user_id'),
            'tests' => array(self::HAS_MANY, 'Tests', 'user_id'),
            'studentLists' => array(self::HAS_MANY, 'StudentLists', 'user_id'),
        );
    }

    public function attributeLabels(){
        return array(
            'full_name' => 'Meno ucitela',
            'new_password' => 'Nove heslo',
            'new_password2' => 'Potvrdenie hesla',
            'email' => 'Email',
            'permissions' => 'Administrator',
            'about' => 'O sebe',
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

