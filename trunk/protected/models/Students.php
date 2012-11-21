<?php
/**
 * Reprezentuje študentov v databáze.
 * @author Milos Blascak
 */
class Students extends ActiveRecord
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
            array('email', 'email' ),
        );
    }

    /**
     * Nazvy premennych vo formularoch
     * @return array
     */
    public function attributeLabels()
    {
        return array(
            'name' => 'Meno',
            'list_id' => 'Zoznam',
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
        if ($this->list_id > 0) {
            $criteria->join = 'left join tis_students_lists tsl on tsl.student_id=t.id';
            $criteria->condition = 'tsl.list_id= :list_id';
            $criteria->params = array(':list_id' => $this->list_id);
        }
        if( (int)$this->list_id < 0 ){
            $criteria->condition = 'not exists (SELECT * '
                . 'FROM tis_students_lists tsl '
                . 'WHERE tsl.student_id = t.id '
                . ')';
        }

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('email', $this->email, true);

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
        if(strlen($result) == 0){
            $result = 'Student nie je v ziadnom zozname';
        }
        return $result;
    }

    public function afterDelete(){
        Yii::app()->db->createCommand()->delete('tis_students_lists', 'student_id = :student_id', array(':student_id' => $this->id));
        parent::afterDelete();
    }
}

?>