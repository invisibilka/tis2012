<?php
/**
 * Zakladny controller
 * @author V.Jurenka
 */
class Controller extends CController
{
    /**
     * layout stranky
     */
    public $layout = '//layouts/column1';


    /**
     * V sucasnosti nepouzivana premenna, ponechana, keby sa sme rozhodli breacrumbs opat zapnut
     */
    public $breadcrumbs = array();

    /**
     * @var boolurcuje ci sa zobrazi submenu
     */
    public $showSubmenu = true;

    /**
     * @var int urcuje, ktora polozka submenu je aktivna
     */
    public $submenuIndex = 0;
	
	/*
	* pomocny string pre zoznam funkcii, posiela sa v nom html na zobrazenie do panelu - specificke pre kazdy view
	*/
	public $functions = "";

    /**
     * zabezpeci zakaz pristupu pre neprihlasenych pouzivatelov
     * @param \CFilterChain $filterChain
     */
    public function filterAccessControl($filterChain)
    {
        $rules = $this->accessRules();

        // default
        $rules[] = array('allow', 'users' => array('@'));
        $rules[] = array('deny', 'deniedCallback' => array($this, 'denyAction'));

        $filter = new CAccessControlFilter;
        $filter->setRules($rules);
        $filter->filter($filterChain);
    }

    /**
     * vykona sa pri nepovolenej akcii
     */
    public function denyAction()
    {
        $this->redirect(Yii::app()->baseUrl . '/site/error/id/911');
    }

    /** Filtrovanie akcii, pouzite pre zapnutie kontroly pristupu k akciam
     * @return array
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * zisti, ci je momentalne prihlaseny administrator
     * @return bool
     */
    protected  function isAdminRequest()
    {
        $user_model = Users::model()->findByPk(Yii::app()->user->id);
        return $user_model ? $user_model->permissions : false;
    }
}