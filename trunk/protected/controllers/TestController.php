<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Katka
 * Date: 31.10.2012
 * Time: 15:00
* Toto je kontroler, ktorý zabezpečuje prácu s jednotlivými úlohami.
 */

class TestController extends Controller{


    /**
     * Funkcia na zobrazenie danej úlohy
     */
    public function actionView() {
        $this->render('view', array());
    }

    /**
     * Funkcia pre aktualizáciu už existujúcej úlohy alebo vytvorenie novej.
     */
    public function actionUpdate() {
        $this->render('update', array());
    }

    /**
     * Funkcia na vymazanie danej úlohy
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Tests::model()->deleteByPk($id);
    }


    /**
     * Funkcia, ktorá zabezpečí export do formátu PDF a jeho tlač.
     */
    public function actionPrintPdf() {

    }

    /**
     * Funkcia zabezpečí vloženie úloh do príloh a odošle email konkrétnym osobám
     */
    public function actionEmail() {
        $this->render('email', array());
    }

    /**
     * Funkcia pre vyhľadávanie v úlohách.
     */
    public function actionFind()
    {
        $this->render('find', array('model' => new Tests()));
    }

    /**
     * funkcie kontrolueje pristupove prava k akciam
     * @param CFilterChain $filterChain
     */
    public function filterAccessControl($filterChain)
    {
        // call $filterChain->run() to continue filter and action execution
    }

}
?>
