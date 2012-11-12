<?php
  public class StudentController extends Controller
{

    public function actionView()
    {
        $this->render('view', array());
    }

    public function actionUpdate()
    {
        $this->render('update', array());
    }

    public function actionDelete()
    {

    }

     public function filterAccessControl($filterChain)
    {
        // call $filterChain->run() to continue filter and action execution
    }

}

?>
