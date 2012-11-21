<?php
/**
 * Nadtrieda pre modely
 * Zabezpecuje logovanie
 * @author V. Jurenka
 *
 */
class ActiveRecord extends CActiveRecord
{
    /**
     * zabezpeci logovanie pri dopytoch INSERT a SELECT
     */
    protected function afterSave()
    {
        $user = Users::model()->findByPk(Yii::app()->user->id);
        $name = $user ? $user->username : 'neznamy';
        Yii::log('Cas: '.time().' Uzivatel: '.$name.', Zmena v tabulke: '.$this->tableName().', pre kluc: id = '.$this->id.'. nove hodnoty :'. print_r($this->getAttributes(), true).'', 'db_log');
        parent::afterSave();
    }

    /**
     * zabezpeci logovanie pri dopytoch DELETE
     */
    protected function afterDelete()
    {
        $user = Users::model()->findByPk(Yii::app()->user->id);
        $name = $user ? $user->username : 'neznamy';
        Yii::log('Cas: '.time().' Uzivatel: '.$name.', Vymazany udaj v tabulke: '.$this->tableName().', pre kluc: id = '.$this->id.'. zmazane hodnoty :'. print_r($this->getAttributes(), true).'', 'db_log');
        parent::afterDelete();
    }
}
