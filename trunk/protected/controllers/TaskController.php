<?php
/**
 * Komponent zabezpečuje manipuláciu s úlohami.
 * @author Eva Libantova
 */
class TaskController extends Controller
{
    public $defaultAction = 'my';

    /**
     * Zobrazí úlohu so zadaným id, ak úloha s daným id neexistuje vráti chybu 404.
     * @throws CHttpException
     */
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tasks::model()->findByPk($id);
        if ($model) {
            $this->render('view', array('model' => $model));
        } else {
            throw new CHttpException(404, 'Zadaná úloha neexistuje. :(');
        }

    }

    /**
     * Zobrazí formulár na úpravu úlohy so zadaným id, spracuje zadané údaje z formulára a presmeruje späť na zoznam úloh.
     * @throws CHttpException
     */
    public function actionUpdate()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tasks::model()->findByPk($id);
        if (!$model) {
            $model = new Tasks();
        }
            //normalna validacia a ulozenie
            if (isset($_POST['Tasks'])) {
                $model->setAttributes($_POST['Tasks'], false);
                if ($model->save()) {
                    //tu mozeme dat nejaky redirect a nie iba end (biela stranka)
                    //Yii::app()->end();
                    // $this->redirect(Yii::app()->request->baseUrl . "/task/");
                    $this->redirect($this->createUrl('find', array('saved' => true)));
                }
            }
            $this->render('update', array('model' => $model));

    }

    /**
     * Zmaže úlohu s daným id.
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Tasks::model()->deleteByPk($id);
    }

    /**
     * Pridá komentár k danej úlohe.
     */
    public function actionAddComment()
    {

    }

    /**
     * Pridá hodnotenie k danej úlohe.
     */
    public function actionRating()
    {

    }

    /**
     * Zobrazí zoznam úloh, umožňuje ich filtrovanie.
     */
    public function actionMy()
    {
        $saved = Yii::app()->request->getParam('saved');
        $this->render('my', array('model' => new Tasks(), 'saved' => $saved));
    }

    public function actionPublic()
    {
         $this->render('public', array('model' => new Tasks()));
    }

    /**
     * Zabezpečuje kontrolu oprávnení používateľa.
     * @param CFilterChain $filterChain
     */
    public function filterAccessControl($filterChain)
    {
        // call $filterChain->run() to continue filter and action execution
    }

}

?>
