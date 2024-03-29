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
        $this->showSubmenu = false;
        $model = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->baseUrl);
            }
        }
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
        $this->showSubmenu = false;
        $message = '';
        $model = new Invitations();
        if (isset($_POST['Invitations'])) {
            $model->setAttributes($_POST['Invitations']);
            if ($model->validate()) {
                //posli mail
                $hash_gen = new CPSHash();
                $model->hash = $hash_gen->hash();
                MailSender::sendInvitation($model->email, $model->hash);
                $model->save();
                $message = 'Pozvánka odoslaná';
            }
        }
        $this->render('invite', array('model' => $model, 'message' => $message));
    }

    /**
     * registracia z pozvanky
     */
    public function actionRegister()
    {
        $this->showSubmenu = false;
        $hash = Yii::app()->request->getParam('hash');
        $invitation = Invitations::model()->find('hash = :hash', array(':hash' => $hash));
        if ($invitation) {
            $user = new Users();
            $user->email = $invitation->email;
            $user->full_name = $invitation->email;
            $user->username = $invitation->email;

            $user->password = UserIdentity::encryptPassword('');
            $user->save();

            $identify = new UserIdentity($user->username, '');
            $identify->authenticate();
            Yii::app()->user->login($identify, 0);

            $invitation->delete();
            $this->redirect($this->createUrl('update'));
        }
    }

    /**
     * zobrazi profil pouzivatela
     * @throws CHttpException - neexistujuce id
     */
    public function actionView()
    {
        $this->submenuIndex = 1;
        $id = Yii::app()->request->getParam('id');
        if (!$id) {
            $id = Yii::app()->user->id;
        }
        else {
            $this->showSubmenu = false;
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
        if (!$model) {
            $model = Users::model()->findByPk(Yii::app()->user->id);
        }
        if ($model->id != Yii::app()->user->id && !$this->isAdminRequest()) {
            $this->denyAction();
        }
        if ($model) {
            if (isset($_POST['Users'])) {
                $model->setAttributes($_POST['Users']);
                if ($model->new_password && $model->new_password == $model->new_password2) {
                    $model->password = UserIdentity::encryptPassword($model->new_password);
                }
                if ($model->save()) {
                    if ($model->id == Yii::app()->user->id) {
                        $this->redirect($this->createUrl('view'));
                    }
                    else {
                        $this->redirect($this->createUrl('find'));
                    }
                }
            }
            $this->render('update', array('model' => $model));
        } else {
            throw new CHttpException(404, 'Zadany pouzivatel neexistuje');
        }
    }

    /*
     * vymaze profil pouzivatela
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id', Yii::app()->user->id);
        if ($id != Yii::app()->user->id && !$this->isAdminRequest()) {
            $this->denyAction();
        }
        if (Yii::app()->user->id == $id) {
            Yii::app()->user->logout();
            $model = Users::model()->findByPk($id);
            $model->delete();
            $this->redirect(Yii::app()->homeUrl);
        }
        else {
            $model = Users::model()->findByPk($id);
            $model->delete();
            $this->redirect($this->createUrl('user/find'));
        }
    }

    /*
     * zobrazi zoznam pouzivatelov
     */
    public function actionFind()
    {
        $this->submenuIndex = 2;
        if (!$this->isAdminRequest()) {
            $this->denyAction();
        }
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
            array('allow', 'actions' => array('login', 'register'), 'users' => array('*'))
        );
    }


}
