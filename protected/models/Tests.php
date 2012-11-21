<?php
/**
 * Reprezentuje zoznam vytvorenych pisomiek v databaze.
 * @author Marek Oravec
 */
class Tests extends CActiveRecord
{
    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia Tests
     */
    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * vrati nazov tabulky v databaze
     * @return string nazov tabulky
     */
    public function tableName()
    {
        return 'tis_tests';
    }

    /**
     * Obsahuje pravidla validacie
     * @return array - pravidla validacie
     */
    public function rules()
    {
        return array(
            array('user_id, name', 'required'),
        );
    }

    /**
     * Reprezentuje vztahy medzi modelmi
     * @return array - vztahy medzi modelmi
     */
    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'tasks' => array(self::MANY_MANY, 'Task', 'tis_tests_tasks(task_id, test_id)'),
            'tests_tasks' => array(self::HAS_MANY, 'TestsTasks', 'test_id')
        );
    }

    public function search()
    {
        $criteria = new CDbCriteria();

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    /**
     * vycistenie databazy pri mazani
     */
    protected function afterDelete()
    {
        TestsTasks::model()->deleteAll('test_id = :test_id', array(':test_id' => $this->id));
        parent::afterDelete();
    }

}