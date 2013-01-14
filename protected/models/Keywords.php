<?php
/**
 * Reprezentuje vyhladavanie v ulohach podla klucovych slov.
 * @author Katka
 */
class Keywords extends ActiveRecord
{
    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia Keywords
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
        return 'tis_keywords';
    }

    /**
     * Obsahuje pravidla validacie
     * @return array - pravidla validacie
     **/
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
            'tasks' => array(self::MANY_MANY, 'Tasks', 'tis_tasks_keywords(keyword_id,task_id )'),

        );
    }
}
