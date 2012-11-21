<?php
/**
 * Hlavny kontroller pre stranku, obsahuje zakladne akcie
 * @author V.Jurenka, ale z velkej casti povodny kod frameworku
 */
class SiteController extends Controller
{
    /**
     * Deklaracia specialnych akcii
     * @return array specialne akcie
     */
    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * index stranka, presmruva na login
     */
    public function actionIndex()
    {
        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->baseUrl.'/user/login');
        }
        else{
            $this->redirect(Yii::app()->baseUrl.'/task/');
        }
    }

    /**
     * error stranka
     */
    public function actionError()
    {
        if(Yii::app()->request->getParam('id') == 911){
            $this->redirect(Yii::app()->baseUrl.'/user/login');
            Yii::app()->end();
        }
        if(Yii::app()->request->getParam('id') == 123){
            echo 'Nepovoleny pristup!';
            Yii::app()->end();
        }
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * kontaktna stranka
     */
    public function actionContact()
    {
        $model = new TestEmailForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Zabezpečuje kontrolu oprávnení používateľa.
     * @return array
     */
    public function accessRules()
    {
        return array(
            array('allow', 'actions' => array('error' , 'index'), 'users'=>array('*'))
        );
    }

}