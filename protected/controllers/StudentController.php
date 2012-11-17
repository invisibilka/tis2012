<?php
/**
 * Komponent zabezpečuje manipuláciu so študentami.
 * @author Milos Blascak
 */
class StudentController extends Controller
{
    /**
     * Zobrazí študenta s daným id.
     * @throws CHttpException - chyba ak je zadane neplatne id
     */
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Students::model()->findByPk($id);
        if ($model) {
            $this->render('view', array('model' => $model));
        } else {
            throw new CHttpException(404, 'Zadaný študent neexistuje. :(');
        }
    }

    /**
     * Zobrazí formulár na úpravu študenta s daným id, spracuje zadané dáta.
     * @throws CHttpException - chyba ak je zadane neplatne id
     */
    public function actionUpdate()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Students::model()->findByPk($id);
        if ($model) {
            //normalna validacia a ulozenie
            if (isset($_POST['Students'])) {
                $model->setAttributes($_POST['Students'], false);
                if ($model->save()) {
                    Yii::app()->end();
                }
            }
            $this->render('update', array('model' => $model));


        } else {
            throw new CHttpException(404, 'Zadaný študent neexistuje. :(');
        }
    }

    /**
     * Zmaže študenta s daným id.
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Students::model()->deleteByPk($id);
    }

}

?>
