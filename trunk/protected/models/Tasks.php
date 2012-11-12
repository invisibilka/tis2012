<?php
/**
 * Reprezentuje ulohy v databaze.
 * V. Jurenka
 */
class Tasks extends CActiveRecord
{
    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia StudentLists
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
        return 'tis_tasks';
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
     * Vyhladava a triedi ulohy z databazy.
     * @return CActiveDataProvider
     */
    public function search(){
        $criteria = new CDbCriteria();

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }
    /**
     * Reprezentuje vztahy medzi modelmi
     * @return array - vztahy medzi modelmi
     */
    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'keywords' => array(self::MANY_MANY, 'Keywords', 'tis_tasks_keywords(task_id, keyword_id)'),
            'comments' => array(self::HAS_MANY, 'Comments', 'task_id'),
            'ratings' => array(self::HAS_MANY, 'Ratings', 'task_id'),
            'tests' => array(self::MANY_MANY, 'Test', 'tis_tests_tasks(task_id, test_id)'),
            'tests_tasks' => array(self::HAS_MANY, 'TestsTasks', 'task_id'),
        );
    }

    /** Funkcia definuje text, ktory sa ma zobrazit pri prvkoch formulara.
     * @return array - pole labelov
     */
    public function attributeLabels(){
        return array(
            'name' => 'Názov úlohy',
            'html' => 'Text úlohy',
            'is_public' => 'Verejná (zobrazuje&nbsp;sa&nbsp;ostatným&nbsp;učiteľom)',

        );
    }
}
