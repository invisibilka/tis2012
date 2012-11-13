<?php
/**
 * Komponent zabezpečuje manipuláciu so zoznamami študentov.
  *@author Marek Oravec
 */
class StudentListController extends Controller {

	/**
     * Vymaže zoznam študentov so zadaným id.
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Students::model()->deleteByPk($id);
    }
	
	/**
     * Naimportuje študentov zo zdrojového súboru.
     */
	public function actionImport() {
	}
	
	/**
     * Zobrazí zoznam študentov so zadaným id. Ak zoznam s daným id neexistuje, vráti chybu 404.
     * @throws CHttpException
     */
	public function actionView() {
		$id = Yii::app()->request->getParam('id');
        $model = StudentLists::model()->findByPk($id);
		if ($model) {
			$student = new Students;
			$student->list_id=$model->id;
			$this->render('view', array('model' => $model, 'student' => $student));
		}
		else {
			throw new CHttpException(404, 'Zadaný zoznam študentov neexistuje.');
		}
		
	}
	
	/**
     * Upraví zoznam študentov so zadaným id.
     */
	public function actionUpdate() {
		$this->render('update', array());
	}

}