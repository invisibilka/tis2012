<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Vladimir
 * Date: 31.10.2012
 * Time: 14:42
 * To change this template use File | Settings | File Templates.
 */
class UserController extends Controller
{

    /**
     * prihlasi pouzivatela
     */
    public function actionLogin(){

    }

    /**
     * odhlasi pouzivatela
     */
    public function actionLogout(){

    }

    /**
     * pozve pouzivatela do systemu
     */
    public function actionInvite(){

    }


    /**
     * zobrazi profil pouzivatela
     */
    public function actionView() {
        $this->render('view', array());
    }

    /**
     * zmeni profil pouzivatela
     */
    public function actionUpdate() {
        $this->render('update', array());
    }

    /*
     * vymaze profil pouzivatela
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Users::model()->deleteByPk($id);
    }



    public function actionEmail() {
        $this->render('email', array());
    }

    public function actionFind()
    {
        $this->render('find', array('model' => new Users()));
    }


}
