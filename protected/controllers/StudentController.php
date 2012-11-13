<?php
/**
  * Komponent zabezpečuje manipuláciu so študentami.
  * @author Milos Blascak
*/
  class StudentController extends Controller
{
      /**
       * Zobrazí študenta s daným id.
       */
      public function actionView()
    {
        $this->render('view', array());
    }
      /**
       * Zobrazí formulár na úpravu študenta s daným id, spracuje zadané dáta.
       */
    public function actionUpdate()
    {
        $this->render('update', array());
    }
      /**
       * Zmaže študenta s daným id.
       */
    public function actionDelete()
    {
        $id = Yii::app()->request->getParam('id');
        Students::model()->deleteByPk($id);
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
