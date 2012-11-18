<?php
/**
 * Komponent zabezpečuje manipuláciu so zoznamami študentov.
 * @author Marek Oravec
 */
class StudentListController extends Controller
{
    /**
     * @var string predvolena akcia pri zadani adresy /user/
     */
    public $defaultAction = 'find';

    /**
     * Vymaže zoznam študentov so zadaným id.
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Students::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && $this->isAdminRequest()) {
                $this->redirect(Yii::app()->baseUrl . '/site/error/id/123');
            }
            $model->delete();
        }
    }

    /**
     * Zobrazí zoznam študentov so zadaným id. Ak zoznam s daným id neexistuje, vráti chybu 404.
     * @throws CHttpException
     */
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        $model = StudentLists::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && $this->isAdminRequest()) {
                $this->redirect(Yii::app()->baseUrl . '/site/error/id/123');
            }
            $student = new Students;
            $student->list_id = $model->id;
            $this->render('view', array('model' => $model, 'student' => $student));
        } else {
            throw new CHttpException(404, 'Zadaný zoznam študentov neexistuje.');
        }

    }

    /**
     * Upraví zoznam študentov so zadaným id.
     */
    public function actionUpdate()
    {
        $id = Yii::app()->request->getParam('id');
        $model = StudentLists::model()->findByPk($id);
        if (!$model) {
            $model = new StudentLists();
            $model->user_id = Yii::app()->user->id;
        }
        else{
            if ($model->user_id != Yii::app()->user->id && $this->isAdminRequest()) {
                $this->redirect(Yii::app()->baseUrl . '/site/error/id/123');
            }
        }
        if (isset($_POST['StudentLists'])) {
            $model->setAttributes($_POST['StudentLists'], false);
            $model->_file = CUploadedFile::getInstance($model, '_file');
            if ($model->save()) {
                //handle xlsx import, VJ
                $xlsx = new XLXSImport();
                $xlsx->import(Yii::app()->user->id, $model, $model->_file->tempName);

                $this->redirect($this->createUrl('view', array('id' => $model->id)));
            }
        }
        $this->render('update', array('model' => $model));
    }

    /**
     * Zobrazi vsetky zoznamy studentov pre daneho pouzivtatela
     * pridal V.Jurenka
     */
    public function actionFind()
    {
        $model = new StudentLists();
        $model->user_id = Yii::app()->user->id;
        if (isset($_GET['StudentLists'])) {
            $model->setAttributes($_GET['StudentLists'], false);
        }
        $this->render('find', array('model' => $model));
    }

}