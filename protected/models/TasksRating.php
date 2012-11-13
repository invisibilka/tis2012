<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Katka
 * Date: 31.10.2012
 * Time: 14:09
 * To change this template use File | Settings | File Templates.
 */
class TasksRating extends CActiveRecord
{
    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia TasksRating
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
        return 'tis_tasks_rating';
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
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'tasks' => array(self::BELONGS_TO, 'Tasks', 'task_id'),

        );
    }
}
