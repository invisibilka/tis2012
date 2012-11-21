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

    public $showSubmenu = false;

    /**
     * Funkcia na zobrazenie danej úlohy
     */
    public function actionView()
    {
        $this->showSubmenu = true;
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
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && $this->isAdminRequest()) {
                $this->redirect(Yii::app()->baseUrl . '/site/error/id/123');
            }
            $model->delete();
        }
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
        $this->showSubmenu = true;
        $this->submenuIndex = 1;
        $id = Yii::app()->request->getParam('id');
        $model = new TestEmailForm();
        $model->test_id = $id;
        if (isset($_POST['TestEmailForm'])) {
            $model->setAttributes($_POST['TestEmailForm'], true);
            if ($model->validate()) {
                MailSender::sendEmails(
                    StudentLists::model()->findByPk($model->list_id),
                    Users::model()->findByPk(Yii::app()->user->id),
                    Tests::model()->findByPk($model->test_id),
                    $model->subject,
                    $model->body);
                $this->redirect($this->createUrl('view', array('id' => $model->test_id)));
            }
        }

        $this->render('email', array('model'=>$model));
    }

    /**
     * Funkcia pre vyhľadávanie v úlohách.
     */
    public function actionFind()
    {
        $model = new Tests();
        $model->user_id = Yii::app()->user->id;
        if (isset($_GET['Tests'])) {
            $model->setAttributes($_GET['Tests'], false);
        }
        $this->render('find', array('model' => $model));
    }


}

?>
