<?php
/**
 * Toto je kontroler, ktorý zabezpečuje prácu s jednotlivými úlohami.
 * @author Katka Ivanyiova
 */

class TestController extends Controller
{
    /**
     * @var string predvolena akcia pri zadani adresy /user/
     */
    public $defaultAction = 'find';

    /**
     * Funkcia na zobrazenie danej úlohy
     */
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tests::model()->findByPk($id);
        $html = $this->renderPartial('_testpdf', array('model' => $model), true);
        $this->render('view', array('model' => $model, 'html' => $html));
    }

    /**
     * Funkcia pre aktualizáciu už existujúcej úlohy alebo vytvorenie novej.
     */
    public function actionUpdate()
    {
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
    public function actionPrintPdf()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tests::model()->findByPk($id);
        $html = $this->renderPartial('_testpdf', array('model' => $model), true);
        PDFExport::createPDF($html);
        //echo $html;
    }

    /**
     * Funkcia zabezpečí vloženie úloh do príloh a odošle email konkrétnym osobám
     */
    public function actionEmail()
    {
        $this->render('email', array());
    }

    /**
     * Funkcia pre vyhľadávanie v úlohách.
     */
    public function actionFind()
    {
        $this->render('find', array('model' => new Tests()));
    }


}

?>
