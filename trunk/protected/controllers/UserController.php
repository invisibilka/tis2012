<?php
/**
 * Controller obsahuje akcie na manipulaciu s pouzivatelmi systemu.
 * @author Vladimir Jurenka
 */
class UserController extends Controller
{
    /**
     * @var string predvolena akcia pri zadani adresy /user/
     */
    public $defaultAction = 'update';

    /**
     * prihlasi pouzivatela
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm']; // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->baseUrl);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * odhlasi pouzivatela
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * pozve pouzivatela do systemu
     */
    public function actionInvite()
    {
        $saved = false;
        $model = new Invitations();
        if (isset($_POST['Invitations'])) {
            $model->setAttributes($_POST['Invitations'], false);
            if ($model->save()) {
               $saved = true;
            }
        }
        $this->render('invite', array('model' => $model, 'saved' => $saved));
    }


    /**
     * zobrazi profil pouzivatela
     * @throws CHttpException - neexistujuce id
     */
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        if (!$id) {
            $id = Yii::app()->user->id;
        }
        $model = Users::model()->findByPk($id);
        if ($model) {
            $this->render('view', array('model' => $model));
        }
        else {
            throw new CHttpException(404, 'Zadany pouzivatel neexistuje');
        }
    }

    /**
     * zmeni profil pouzivatela
     * @throws CHttpException
     */
    public function actionUpdate()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Users::model()->findByPk($id);
        if(!$model){
            $model = Users::model()->findByPk(Yii::app()->user->id);
        }
        if ($model) {
            if (isset($_POST['Users'])) {
                $model->setAttributes($_POST['Users']);
                if($model->new_password && $model->new_password == $model->new_password2){
                    $model->password = UserIdentity::encryptPassword($model->new_password);
                }
                if ($model->save()) {
                    $this->redirect($this->createUrl('view', array('id' => $model->id)));
                }
            }
            $this->render('update', array('model' => $model));
        } else{
            throw new CHttpException(404, 'Zadany pouzivatel neexistuje');
        }
    }

    /*
     * vymaze profil pouzivatela
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Users::model()->deleteByPk($id);
    }

    /*
     * zobrazi zoznam pouzivatelov
     */
    public function actionFind()
    {
        $model = new Users();
        if (isset($_GET['Users'])) {
            $model->setAttributes($_GET['Users'], false);
        }
        $this->render('find', array('model' => $model));
    }

    /**
     * Zabezpečuje kontrolu oprávnení používateľa.
     * @return array
     */
    public function accessRules()
    {
        return array(
            array('allow', 'actions' => array('login'), 'users'=>array('*'))
        );
    }





}
