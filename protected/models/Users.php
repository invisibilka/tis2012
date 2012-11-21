<?php
/**
 * Reprezentuje pouzivatelov v databaze.
 * @author V. Jurenka
 */
class Users extends ActiveRecord
{
    /**
     * @var nove heslo v plaintexte, ak si ho chce pouzivatel zmenit
     */
    public $new_password;

    /**
     * @var kontrola noveho heslo v plaintexte, ak si ho chce pouzivatel zmenit
     */
    public $new_password2;

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
        return 'tis_users';
    }

    /**
     * Obsahuje pravidla validacie
     * @return array - pravidla validacie
     **/
    public function rules()
    {
        return array(
            array('new_password', 'compare', 'compareAttribute' => 'new_password2', 'message' => 'Heslá sa nezhodujú!'),
            array('email, username', 'unique', 'message' => 'Položka "{attribute}" musí byť jedinečná a je už bohužiaľ obsadená.'),
            array('email, username, full_name', 'required', 'message' => 'Položka "{attribute}" musí byť vyplnená.'),
            array('email', 'email' ,  'message' =>'Položka "{attribute}" nie je platná emailová adresa.'),
            array('about', 'length', 'max' => 3000,  'message' =>'Do poľa "{attribute}" zadajte maximálne 3000 znakov.'),
            array('new_password, new_password2', 'length', 'max' => 64,  'message' =>'Maximálna dĺžka hesla je 64 znakov.'),
            array('permissions', 'boolean'), //toto sa stane len wanna-be hackerom, ti nepotrebuju slovensky preklad
        );
    }

    /**
     * Reprezentuje vztahy medzi modelmi
     * @return array - vztahy medzi modelmi
     */
    public function relations()
    {
        return array(
            'students' => array(self::HAS_MANY, 'Students', 'user_id'),
            'tasks' => array(self::HAS_MANY, 'Tasks', 'user_id'),
            'tests' => array(self::HAS_MANY, 'Tests', 'user_id'),
            'studentLists' => array(self::HAS_MANY, 'StudentLists', 'user_id'),
        );
    }

    /**
     * Slovenske nazvy premennych pre labely
     * @return array
     */
    public function attributeLabels()
    {
        return array(
            'full_name' => 'Meno učiteľa',
            'username' => 'Prihlasovacie meno',
            'new_password' => 'Nové heslo',
            'new_password2' => 'Potvrdenie hesla',
            'email' => 'Email',
            'permissions' => 'Administrátor',
            'about' => 'O sebe',
        );
    }

    /**
     * Vyhladava a triedi pouzivatelov
     * @return CActiveDataProvider
     */
    public function search()
    {
        $criteria = new CDbCriteria();

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('full_name', $this->full_name, true);
        $criteria->compare('email', $this->email, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    /**
     * vycisti databazu od vsetkych studentov a zoznamov studentov daneho pouzivatela pri mazani profilu
     * ulohy a testy zostavaju
     */
    public function afterDelete(){
        parent::afterDelete();
        foreach($this->studentLists as $studentLists){
            $studentLists->delete();
        }
        foreach($this->students as $student){
            $student->delete();
        }
    }

}

