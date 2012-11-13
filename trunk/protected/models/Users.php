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

        );
    }

    public function relations()
    {
        return array(

        );
    }

    public function attributeLabels(){
        return array(
            'full_name' => 'Meno pouzivatela',
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
