<?php
/**
 * Reprezentuje študentov v databáze.
 * @author Milos Blascak
 */
class Students extends CActiveRecord
{
    /**
     * pomocna premenna pri vyhladavani v zozname studentov
     */
    public $list_id;

    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia Students
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
        return 'tis_students';
    }

    /**
     * Obsahuje pravidla validacie
     * @return array - pravidla validacie
     */
    public function rules()
    {
        return array(
            array('email', 'required' ),
            array('email', 'unique'),
            array('email', 'email' ),
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
            'studentLists' => array(self::MANY_MANY, 'StudentLists', 'tis_students_lists(student_id, list_id)')
        );
    }

    /**
     * Vyhladava a triedi studentov z databazy.
     * @return CActiveDataProvider
     */
    public function search()
    {
        $criteria = new CDbCriteria();
        if ($this->list_id) {
            $criteria->join = 'left join tis_students_lists tsl on tsl.student_id=t.id';
            $criteria->condition = 'tsl.list_id= :list_id';
            $criteria->params = array(':list_id' => $this->list_id);
        }

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    public function getNumLists(){
        $listNames = array();
        foreach($this->studentLists as $list){
            $listNames[] = $list->name;
        }
        $result = implode(', ', $listNames);
       /* if(strlen($result) == 0){
            $result = 'student nie je v ziadnom zozname';
        }*/
        return $result;
    }
}

?>