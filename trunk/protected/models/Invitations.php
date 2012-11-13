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