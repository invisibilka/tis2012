<?php
/**
 * Reprezentuje ulohy v databaze.
 * @author Eva Libantova
 */
class Tasks extends CActiveRecord
{

    public $username;

    public $keyword;

    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia Tasks
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
            array('user_id, name, html, is_public', 'required', 'message' => 'Položka "{attribute}" musí byť vyplnená.'),
            array('username, keyword', 'safe'),
        );
    }

    /**
     * Vyhladava a triedi ulohy z databazy.
     * @return CActiveDataProvider
     */
    public function search()
    {
        $criteria = new CDbCriteria();

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('name', $this->name, true);
        if ($this->is_public != NULL) {
            $criteria->compare('is_public', $this->is_public);
        }

        $criteria->compare('rating', '>=' . $this->rating);

        $criteria->with = array('user', 'keywords');
        $criteria->together = true;
        $criteria->compare('user.full_name', $this->username, true);
      //  $criteria->compare('keywords.id', $this->keyword);
        if(strlen($this->keyword)){
            $criteria->compare('keywords.name', explode(',', $this->keyword), true);
        }

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
    public function attributeLabels()
    {
        return array(
            'name' => 'Názov úlohy',
            'html' => 'Text úlohy',
            'is_public' => 'Verejná (zobrazuje&nbsp;sa&nbsp;ostatným&nbsp;učiteľom)',
            'rating' => 'Hodnotenie',
            'user' => 'Autor úlohy',
            'username' => 'Autor úlohy'

        );
    }

    /**
     * Vrati pole sukromna/verejna do filtra
     * @author V. Jurenka
     * @return array
     */
    public function getPublicStates()
    {
        return array(
            array('id' => '0', 'name' => 'Sukromna'),
            array('id' => '1', 'name' => 'Verejna'),
        );
    }

    /**
     * Vrati pouzite klusove slova
     * @author V. Jurenka
     * @return array
     */
    public function getKeywordsList()
    {
        $keywords = array();
        foreach($this->keywords as $keyword){
            $keywords[] = $keyword->name;
        }
        $result = implode(', ', $keywords);
        return $result;
    }
}
