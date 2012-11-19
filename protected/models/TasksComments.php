<?php
/**
 * Reprezentuje komentare k uloham v databaze.
 * @author Eva Libantova
 */
class TasksComments extends CActiveRecord {
    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia TasksComments
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
        return 'tis_tasks_comments';
    }
    /**
     * Obsahuje pravidla validacie
     * @return array - pravidla validacie
     */
    public function rules()
    {
        return array(
            array('text, user_id, task_id, date', 'required', 'message' => 'Položka "{attribute}" musí byť vyplnená.'),
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
            'task'=>array(self::BELONGS_TO, 'Tasks', 'task_id')
         );
    }
}