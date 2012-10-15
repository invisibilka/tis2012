<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private static $salt = '$2a$07$';

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $criteria = new CDbCriteria();
        $criteria->select = 'password';
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
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public static function comparePasswords($plain, $encrypted)
    {
        return crypt($plain, $encrypted) == $encrypted;
    }

    public static function encryptPassword($password)
    {
        $salt = self::$salt;
        for ($i = 0; $i < 22; $i++) {
            $salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 63), 1);
        }
        return crypt($password, $salt);
    }
}