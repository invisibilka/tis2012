<?php
/**
 * With love from
 * M. Oravec 
 */
class StudentListController extends Controller {

    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Students::model()->deleteByPk($id);
    }
	
	public function actionImport() {
	}
	
	public function actionView() {
		$id = Yii::app()->request->getParam('id');
        $model = StudentLists::model()->findByPk($id);
		$student = new Students;
		$student->list_id=$model->id;
		$this->render('view', array('model' => $model, 'student' => $student));
	}
	
	public function actionUpdate() {
		$this->render('update', array());
	}

}