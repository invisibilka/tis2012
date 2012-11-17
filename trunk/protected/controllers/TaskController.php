<?php
/**
 * Komponent zabezpečuje manipuláciu s úlohami.
 * @author Eva Libantova
 */
class TaskController extends Controller
{
    /**
     * @var string predvolena akcia pri zadani adresy /user/
     */
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
            $model->setAttributes($_POST['Tasks']);

            //fix smiley path, by V.Jurenka
            $model->html = preg_replace('@.\.\/\.\./\.\./assets/[^/]*/plugins/emotions/img/@', Yii::app()->baseUrl . '/images/emotions/', $model->html);

            if ($model->save()) {
                //tu mozeme dat nejaky redirect a nie iba end (biela stranka)
                //Yii::app()->end();
                // $this->redirect(Yii::app()->request->baseUrl . "/task/");
                $this->redirect($this->createUrl('my', array('saved' => true)));
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
        if (isset($_GET['task_id']) && isset($_GET['rating'])) {
            $model = TasksRating::model()->findByAttributes(array('task_id' => $_GET['task_id'], 'user_id' => Yii::app()->user->id));
            if (!$model) {
                $model = new TasksRating();
            }
            $model->setAttributes(array('task_id' => $_GET['task_id'], 'rating' => $_GET['rating'], 'user_id' => Yii::app()->user->id), false);
            $model->save();
            //prepocitanie priemerov v tabulke tis_tasks
            $ratings = TasksRating::model()->findAllByAttributes(array('task_id' => $_GET['task_id']));
            $tasks = Tasks::model()->findByPk($_GET['task_id']);
            $sum = 0;
            $count = 0;
            foreach ($ratings as $rating) {
                $sum += $rating->rating;
                $count++;
            }
            //pozor na count == 0 pri deleni ;)
            $average = 0;
            if($count > 0){
                $average = $sum / $count;
            }
            //
            $tasks->setAttribute('rating', $average);
            $tasks->save();
        }
    }

    /**
     * Zobrazí zoznam úloh, umožňuje ich filtrovanie.
     */
    public function actionMy()
    {
        $saved = Yii::app()->request->getParam('saved');
        $model = new Tasks();
        $model->getDbCriteria()->compare('user_id', Yii::app()->user->id);
        if (!$model) {
            $model = new Tasks();
        }
        $this->render('my', array('model' => $model, 'saved' => $saved));
    }

    public function actionPublic()
    {
        $model = new Tasks();
        $model->getDbCriteria()->compare('is_public', true);
        $this->render('public', array('model' => $model));
    }

    /**
     * Zabezpečuje kontrolu oprávnení používateľa.
     * @return array
     */
    public function accessRules()
    {
        return array(

        );
    }

    /** Filtrovanie akcii, pouzite pre zapnutie kontroly pristupu k akciam
     * @return array
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

}

?>
