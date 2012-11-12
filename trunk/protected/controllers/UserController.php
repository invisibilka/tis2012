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

    public function actionLogin(){

    }

    public function actionLogout(){

    }

    public function actionInvite(){

    }


    public function actionView() {
        $this->render('view', array());
    }

    public function actionUpdate() {
        $this->render('update', array());
    }

    public function actionDelete() {

    }

    public function actionPrintPdf() {

    }

    public function actionEmail() {
        $this->render('email', array());
    }

    public function actionFind()
    {
        $this->render('find', array('model' => new Users()));
    }


}
