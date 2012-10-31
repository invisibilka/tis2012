<?php

class Invitations extends CActiveRecord
{

    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tis_invitations';
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
?>