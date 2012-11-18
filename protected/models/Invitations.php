<?php
/**
 * Reprezentuje pozvanky ulozene v databaze
 * @author V. Jurenka
 */
class Invitations extends CActiveRecord
{

    /**
     * Vrati novu instanciu tejto triedy
     * @param string $className
     * @return CActiveRecord - instancia Invitations
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
        return 'tis_invitations';
    }

    /**
     * Obsahuje pravidla validacie
     * @return array - pravidla validacie
     */
    public function rules()
    {
        return array(
            array('email', 'required' ),
            array('email', 'unique' ,'message' => 'Na tento email už bola poslaná pozvánka.'),
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
         );
    }

}
?>