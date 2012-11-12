<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Katka
 * Date: 31.10.2012
 * Time: 15:00
 * To change this template use File | Settings | File Templates.
 */

class TestController extends Controller
{


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
        $this->render('find', array('model' => new Tests()));
    }


    public function filterAccessControl($filterChain)
    {
        // call $filterChain->run() to continue filter and action execution
    }

}
?>
