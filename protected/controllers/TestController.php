<?php
/**
 * Toto je kontroler, ktorý zabezpečuje prácu s jednotlivými úlohami.
 * @author Katka Ivanyiova
 */

class TestController extends Controller
{
    /**
     * @var string predvolena akcia pri zadani adresy /user/
     */
    public $defaultAction = 'find';

    /**
     * @var bool vypne zobrazovanie submenu
     */
    public $showSubmenu = false;

    /**
     * Funkcia na zobrazenie danej úlohy
     */
    public function actionView()
    {
        $this->showSubmenu = true;
        $id = Yii::app()->request->getParam('id');
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                $this->denyAction();
            }
        }
        $html = $this->renderPartial('_testpdf', array('model' => $model), true);
        $this->render('view', array('model' => $model, 'html' => $html));
    }

    /**
     * Funkcia na vymazanie danej úlohy
     */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                $this->denyAction();
            }
            $model->delete();
        }
    }


    /**
     * Funkcia, ktorá zabezpečí export do formátu PDF a jeho tlač.
     */
    public function actionPrintPdf()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                $this->denyAction();
            }
        }
        $html = $this->renderPartial('_testpdf', array('model' => $model), true);
        PDFExport::createPDF($html);
        //echo $html;
    }

    /**
     * Funkcia zabezpečí vloženie úloh do príloh a odošle email konkrétnym osobám
     */
    public function actionEmail()
    {
        $this->showSubmenu = true;
        $this->submenuIndex = 1;
        $id = Yii::app()->request->getParam('id');
        $model = new TestEmailForm();
        $model->test_id = $id;
        if (isset($_POST['TestEmailForm'])) {
            $model->setAttributes($_POST['TestEmailForm'], true);
            if ($model->validate()) {
                $list = StudentLists::model()->findByPk($model->list_id);
                $test = Tests::model()->findByPk($model->test_id);
                if (($test->user_id != Yii::app()->user->id ||  $list->user_id != Yii::app()->user->id) && !$this->isAdminRequest()) {
                    $this->denyAction();
                }
                MailSender::sendEmails(
                    $list,
                    Users::model()->findByPk(Yii::app()->user->id),
                    $test,
                    $model->subject,
                    $model->body);
                $this->redirect($this->createUrl('view', array('id' => $model->test_id)));
            }
        }

        $this->render('email', array('model' => $model));
    }

    /**
     * Funkcia pre vyhľadávanie v úlohách.
     */
    public function actionFind()
    {
        $model = new Tests();
        if(!Users::model()->findByPk(Yii::app()->user->id)->permissions){
            $model->user_id = Yii::app()->user->id;
        }
        if (isset($_GET['Tests'])) {
            $model->setAttributes($_GET['Tests'], false);
        }
        $this->render('find', array('model' => $model));
    }

    /**
     * Funkcia pre aktualizáciu už existujúcej úlohy alebo vytvorenie novej.
     */
    public function actionUpdate()
    {
        $this->showSubmenu = true;
        $this->submenuIndex = 2;
        $id = Yii::app()->request->getParam('id');
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                $this->denyAction();
            }
        }
        else {
            $model = new Tests();
            $model->user_id = Yii::app()->user->id;
            $model->save(false);
            if ($model->id) {
                $this->redirect($this->createUrl('update', array('id' => $model->id)));
            }
            else {
                Yii::app()->end();
            }
        }

        $task = new Tasks();
		if (!$this->isAdminRequest()) {
			$task->is_public = true;
        	$task->merge = true;
		}
        $task->rating = NULL;
        $task->skipped_test = $model->id;
        if (isset($_GET['Tasks'])) {
            $task->setAttributes($_GET['Tasks'], false);
            if (isset($_GET['Tasks']['username'])) {
                $task->username = $_GET['Tasks']['username'];
            }
            if (isset($_GET['Tasks']['keyword'])) {
                $task->keyword = $_GET['Tasks']['keyword'];
            }
        }
        $this->render('update', array('model' => $model, 'task' => $task));
    }

    /**
     * Zobrazi nahlad vysledneho PDF
     * @author V.Jurenka
     */
    public function actionPreview()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                Yii::app()->end();
            }
        }
        $this->renderPartial('_testpdf', array('model' => $model));
    }

    /**
     * Vrati vsetky ulohy  v teste
     * @author V.Jurenka
     */
    public function actionAjaxTasks()
    {
        $id = Yii::app()->request->getParam('id');
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                Yii::app()->end();
            }
        }
        foreach ($model->tests_tasks as $r_task) {
            $task = $r_task->task;
            $this->renderPartial('_task', array('index' => $r_task->task_index, 'model' => $task));
        }
    }

    /**
     * Prida ulohu do testu
     * @author V.Jurenka
     */
    public function actionAjaxAddToTest()
    {
        $id = Yii::app()->request->getParam('id');
        $ids = Yii::app()->request->getParam('tasks');
        if (count($ids) == 0) {
            return;
        }
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                Yii::app()->end();
            }
        }
        $num_tasks = count($model->tests_tasks);
        $index = $num_tasks + 1;
        foreach ($ids as $id) {
            $tt = new TestsTasks();
            $tt->task_index = $index;
            $tt->test_id = $model->id;
            $tt->task_id = $id;
            $tt->save();
            $index++;
        }
    }

    /**
     * Odoberie ulohu z testu
     * @author V.Jurenka
     */
    public function actionAjaxRemoveFromTest()
    {
        $id = Yii::app()->request->getParam('id');
        $ids = Yii::app()->request->getParam('tasks');
        if (count($ids) == 0) {
            return;
        }
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                Yii::app()->end();
            }
        }
        foreach ($ids as $id) {
            $tt = TestsTasks::model()->find('test_id = :test_id AND task_id = :task_id', array(':test_id' => $model->id, ':task_id' => $id));
            if ($tt) {
                $tt->delete();
            }
        }

        //compact
        for($i = 1; $i <= count($model->tasks) + count($ids); $i++){
            $tt = TestsTasks::model()->find('test_id = :test_id AND task_index = :task_index', array(':test_id' => $model->id, ':task_index' => $i));
            if($tt){
                continue;
            }
            $tt = TestsTasks::model()->find('test_id = :test_id AND task_index > :task_index HAVING MIN(task_index - :task_index) ', array(':test_id' => $model->id, ':task_index' => $i));
            if($tt){
                $tt->task_index = $i;
                $tt->update();
            }
        }
    }

    /**
     * Premiestni ulohu v ramci testu
     * @author V.Jurenka
     */
    public function actionAjaxMove()
    {
        $id = Yii::app()->request->getParam('id');
        $index = Yii::app()->request->getParam('index');
        $dir = Yii::app()->request->getParam('dir');
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                Yii::app()->end();
            }
        }

        if ($dir == 0) {
            $tt0 = TestsTasks::model()->find('test_id =:test_id AND task_index = :task_index - 1 ', array(':test_id' => $id, ':task_index' => $index));
            $tt1 = TestsTasks::model()->find('test_id =:test_id AND task_index = :task_index ', array(':test_id' => $id, ':task_index' => $index));
            if ($tt0 && $tt1) {
                $tt0->task_index = $index;
                $tt1->task_index = $index - 1;
                $tt0->save();
                $tt1->save();
            }
        }
        else {
            $tt0 = TestsTasks::model()->find('test_id =:test_id AND task_index = :task_index + 1 ', array(':test_id' => $id, ':task_index' => $index));
            $tt1 = TestsTasks::model()->find('test_id =:test_id AND task_index = :task_index ', array(':test_id' => $id, ':task_index' => $index));
            if ($tt0 && $tt1) {
                $tt0->task_index = $index;
                $tt1->task_index = $index + 1;
                $tt0->save();
                $tt1->save();
            }
        }
    }

    /**
     * Premenuje test
     * @author V.Jurenka
     */
    public function actionAjaxRename()
    {
        $id = Yii::app()->request->getParam('id');
        $name = Yii::app()->request->getParam('name');
        $model = Tests::model()->findByPk($id);
        if ($model) {
            if ($model->user_id != Yii::app()->user->id && !$this->isAdminRequest()) {
                Yii::app()->end();
            }
        }
        $model->name = $name;
        $model->save();
    }
}

?>
