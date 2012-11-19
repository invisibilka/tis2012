<?php
/**
 * Reprezentuje v databáze, ktoré úlohy prislúchajú ku ktorému testu.
 * @author Marek Oravec
 */
class TestsTasks extends CActiveRecord
{

	/**
     * Vráti novú inštanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - inštancia
     */
    static public function model($className = __CLASS__)
    {
        return parent::model($className);
    }

	/**
     * Vráti názov tabuľky uložený v databáze, ktorý prislúcha tomuto modelu
     * @return string - názov tabuľky
     */
    public function tableName()
    {
        return 'tis_tests_tasks';
    }

	/**
     * Vráti pravidlá validácie
     * @return array - pravidlá
     */
    public function rules()
    {
        return array( 

        );
    }

	/**
     * Reprezentuje vzťahy medzi modelmi
     * @return array - vzťahy
     */
    public function relations()
    {
        return array( 
         'test'=>array(self::BELONGS_TO, 'Tests', 'test_id'),
         'task'=>array(self::BELONGS_TO, 'Tasks', 'task_id')
         );
    }

}

?>