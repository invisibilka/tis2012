<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Katka
 * Date: 31.10.2012
 * Time: 15:00
 * To change this template use File | Settings | File Templates.
 */

class TestController extends Controller
{
/** Toto je kontroler, ktorý zabezpečuje prácu s jednotlivými úlohami. */

    public function actionView() { /** Funkcia na zobrazenie danej úlohy */
        $this->render('view', array());
    }

    public function actionUpdate() { /** Funkcia pre aktualizáciu už existujúcej úlohy alebo vytvorenie novej. */
        $this->render('update', array());
    }

    public function actionDelete()
    { /**Funkcia na vymazanie danej úlohy  */
        $id = Yii::app()->request->getParam('id');
        Tests::model()->deleteByPk($id);
    }

    public function actionPrintPdf() {
        /** Funkcia, ktorá zabezpečí export do formátu PDF a jeho tlač. */
    }

    public function actionEmail() { /** Funkcia zabezpečí vloženie úloh do príloh a odošle email konkrétnym osobám */
        $this->render('email', array());
    }

    public function actionFind()
    { /** Funkcia pre vyhľadávanie v úlohách. */
        $this->render('find', array('model' => new Tests()));
    }


    public function filterAccessControl($filterChain)
    {
        // call $filterChain->run() to continue filter and action execution
    }

}
?>
