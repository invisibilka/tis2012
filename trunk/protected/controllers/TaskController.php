<?php

class TaskController extends Controller
{


public function actionView() {
    $this->render('view',array());
}

public function actionUpdate() {
    $this->render('update',array());
}

public function actionDelete() {

}

public function actionAddComment() {

}

public function actionRating() {

}

public function actionFind() {
    $this->render('find',array());
}


public function filterAccessControl($filterChain)
{
    // call $filterChain->run() to continue filter and action execution
}

}
?>
