<?php
/**
 * Komponent zabezpečuje manipuláciu so študentami.
 * @author Milos Blascak
 */
class StudentController extends Controller
{
    /**
     * @var int index do navigacie
     */
    public $submenuIndex = 1;
    /**
     * Zobrazí študenta s daným id.
     * @throws CHttpException - chyba ak je zadane neplatne id
     */
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Students::model()->findByPk($id);
        if ($model) {
            if($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()){
                $this->denyAction();
            }
            $this->render('view', array('model' => $model));
        } else {
            throw new CHttpException(404, 'Zadaný študent neexistuje. :(');
        }
    }

    /**
     * Zobrazí formulár na úpravu študenta s daným id, spracuje zadané dáta.
     */
    public function actionUpdate()
    {
        $id = Yii::app()->request->getParam('id');
        $list_id = Yii::app()->request->getParam('list_id');
        $model = Students::model()->findByPk($id);
        if (!$model) {
            $model = new Students();
        }
        else{
            if($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()){
                $this->denyAction();
            }
        }
        //normalna validacia a ulozenie
        if (isset($_POST['Students'])) {
            $model->setAttributes($_POST['Students'], false);
            $model->user_id = Yii::app()->user->id;
            if ($model->save()) {
                //pridavanie noveho do zoznamu, VJ
                if($list_id){
                    $list = StudentLists::model()->findByPk($list_id);
                    if($list && $list->user_id == Yii::app()->user->id){
                        $list->addStudent($model);
                        $this->redirect(Yii::app()->createUrl('studentList/view',array('id' => $list_id)));
                    }
                }
                $this->redirect($this->createUrl('find'));
            }
        }
        $this->render('update', array('model' => $model));
    }

    /**
     * Zmaže študenta s daným id.
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Students::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                $this->denyAction();
            }
            $model->delete();
        }
    }

    /**
     * Zobrazi vsetkych studentov patriacich danemu pouzivatelovi
     * @author V.Jurenka
     */
    public function actionFind()
    {
        $model = new Students();
        if(!Users::model()->findByPk(Yii::app()->user->id)->permissions){
            $model->user_id = Yii::app()->user->id;
        }
        if (isset($_GET['Students'])) {
            $model->setAttributes($_GET['Students'], false);
            if (isset($_GET['Students']['list_id'])) {
                $model->list_id = $_GET['Students']['list_id'];
            }
        }
        $lists = StudentLists::model()->findAll('user_id = :user_id', array(':user_id' => Yii::app()->user->id));
        $this->render('find', array('model' => $model, 'lists' => $lists));
    }

}

?>
