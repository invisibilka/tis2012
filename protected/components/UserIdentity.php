<?php

/**
 * Komponent zabezpecuje prihlasovanie pouzivatela a sifrovanie hesiel.
 * @author V.Jurenka
 */
class UserIdentity extends CUserIdentity
{

    /**
     * pouziva sa na kryptovanie hesiel
     * @var string
     */
    private static $salt = '$2a$07$';

    /**
     * @var null id prihlaseneho usera
     */
    private $_id = NULL;

    /**
     * Prihlasi pouzivatela
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 'id, password';
        $criteria->addCondition('username = :username');
        $criteria->params = array(':username' => $this->username);

        $user = Users::model()->find($criteria);

        if ($user == NULL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if (!self::comparePasswords($this->password, $user->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else {
            $this->_id = $user->id;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    /** Otestuje ci zadane heslo zodpoveda zasifrovanej podobe hesla z databazy
     * @param $plain - heslo
     * @param $encrypted - zasiforvana podoba hesla
     * @return bool - vysledok testu
     */
    public static function comparePasswords($plain, $encrypted)
    {
        return crypt($plain, $encrypted) == $encrypted;
    }

    /** Zasifruje heslo algoritmom Blowfish
     * @param $password - heslo
     * @return string - zasifrovane heslo
     */
    public static function encryptPassword($password)
    {
        $salt = self::$salt;
        for ($i = 0; $i < 22; $i++) {
            $salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 63), 1);
        }
        return crypt($password, $salt);
    }

    /**
     * vrati id prihlaseneho usera
     * @return null
     */
    public function getId() {
        return $this->_id;
    }

}