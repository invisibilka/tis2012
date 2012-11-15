<?php
/**
 * Controller obsahuje akcie na manipulaciu s pouzivatelmi systemu.
 * @author Vladimir Jurenka
 */
class UserController extends Controller
{
    public $defaultAction = 'find';

    /**
     * prihlasi pouzivatela
     */
    public function actionLogin()
    {

    }

    /**
     * odhlasi pouzivatela
     */
    public function actionLogout()
    {

    }

    /**
     * pozve pouzivatela do systemu
     */
    public function actionInvite()
    {

    }


    /**
     * zobrazi profil pouzivatela
     */
    public function actionView()
    {
        $this->render('view', array());
    }

    /**
     * zmeni profil pouzivatela
     */
    public function actionUpdate()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Users::model()->findByPk($id);
        if ($model) {
            if (isset($_POST['Users'])) {
                $model->setAttributes($_POST['Users'], false);
                if ($model->save()) {
                    $this->redirect($this->createUrl('view', array('id' => $model->id)));
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
        $id = Yii::app()->request->getParam('id');
        Users::model()->deleteByPk($id);
    }

    /*
     * zobrazi zoznam pouzivatelov
     */
    public function actionFind()
    {
        $this->render('find', array('model' => new Users()));
    }


}
