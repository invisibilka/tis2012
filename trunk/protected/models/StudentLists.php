<?php
/**
 * Reprezentuje zoznamy študentov v databáze.
 * Milos Blascak
 */
class StudentLists extends CActiveRecord
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
        return 'tis_student_lists';
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
            'students'=>array(self::MANY_MANY, 'Students', 'tis_students_lists(list_id, student_id)')
         );
    }


    /**
     * Pomocna funkcia na vyhladavanie v zoznamoch studentov
     * pridal V. Jurenka
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

}

?>