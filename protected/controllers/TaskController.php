<?php

class TaskController extends Controller
{
    public $defaultAction = 'view';
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tasks::model()->findByPk($id);
        if($model){
            $this->render('view', array('model'=>$model));
        } else {
            throw new CHttpException(404,'Zadaná úloha neexistuje. :(');
        }

    }

    public function actionUpdate()
    { $id = Yii::app()->request->getParam('id');
        $model = Tasks::model()->findByPk($id);
        if($model){
            $this->render('update', array('model'=>$model));
        } else {
            throw new CHttpException(404,'Zadaná úloha neexistuje. :(');
        }
    }

    public function actionDelete()
    {

    }

    public function actionAddComment()
    {

    }

    public function actionRating()
    {

    }

    public function actionFind()
    {
        $this->render('find', array('model' => new Tasks()));
    }

    public function filterAccessControl($filterChain)
    {
        // call $filterChain->run() to continue filter and action execution
    }

}

?>
