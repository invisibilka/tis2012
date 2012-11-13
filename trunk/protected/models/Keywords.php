<?php
/**
 * Date: 31.10.2012
 * Time: 13:49
 * @author Katka
 */
class Keywords extends CActiveRecord
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
