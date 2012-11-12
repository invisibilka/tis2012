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
		$this->render('view', array());
	}
	
	public function actionUpdate() {
		$this->render('update', array());
	}

}