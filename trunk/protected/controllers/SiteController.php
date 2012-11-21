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