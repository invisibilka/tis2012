<?php
/**
 * User: V. Jurenka
 * Date: 21.11.2012
 * Time: 11:48
 */
class ActiveRecord extends CActiveRecord
{

    protected function afterSave()
    {
        $user = Users::model()->findByPk(Yii::app()->user->id);
        $name = $user ? $user->username : 'neznamy';
        Yii::log('Cas: '.time().' Uzivatel: '.$name.', Zmena v tabulke: '.$this->tableName().', pre kluc: id = '.$this->id.'. nove hodnoty :'. print_r($this->getAttributes(), true).'', 'db_log');
        parent::afterSave();
    }

    protected function afterDelete()
    {
        $user = Users::model()->findByPk(Yii::app()->user->id);
        $name = $user ? $user->username : 'neznamy';
        Yii::log('Cas: '.time().' Uzivatel: '.$name.', Vymazany udaj v tabulke: '.$this->tableName().', pre kluc: id = '.$this->id.'. zmazane hodnoty :'. print_r($this->getAttributes(), true).'', 'db_log');
        parent::afterDelete();
    }
}
