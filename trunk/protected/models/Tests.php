<?php
/**
 * Reprezentuje zoznam vytvorenych pisomiek v databaze.
 */
class Tests extends CActiveRecord {
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

        );
    }
    /**
     * Reprezentuje vztahy medzi modelmi
     * @return array - vztahy medzi modelmi
     */
    public function relations()
    {
        return array( 
            'user'=>array(self::BELONGS_TO, 'Users', 'user_id'),
			'tasks' => array(self::MANY_MANY, 'Task', 'tis_tests_tasks(task_id, test_id)'),
            'tests_tasks' => array(self::HAS_MANY, 'TestsTasks', 'test_id')
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