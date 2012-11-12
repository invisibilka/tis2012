<?php

class TaskController extends Controller
{
    public $defaultAction = 'find';

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

    public function actionUpdate()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tasks::model()->findByPk($id);
        if($model){
            //normalna validacia a ulozenie
            if (isset($_POST['Tasks'])) {
                $model->setAttributes($_POST['Tasks'], false);
                if ($model->save()) {
            //tu mozeme dat nejaky redirect a nie iba end (biela stranka)
                    //Yii::app()->end();
                   // $this->redirect(Yii::app()->request->baseUrl . "/task/");
                  $this->redirect($this->createUrl('find',array('saved' => true)));
                }
            }
            $this->render('update', array('model'=>$model));


        } else {
            throw new CHttpException(404, 'Zadaná úloha neexistuje. :(');
        }
    }

    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Tasks::model()->deleteByPk($id);
    }

    public function actionAddComment()
    {

    }

    public function actionRating()
    {

    }

    public function actionFind()
    {
        $saved = Yii::app()->request->getParam('saved');
        $this->render('find', array('model' => new Tasks(), 'saved' => $saved));
    }

    public function filterAccessControl($filterChain)
    {
        // call $filterChain->run() to continue filter and action execution
    }

}

?>