<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public $showSubmenu = true;

    /**
     * Default deny rule
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

    protected  function isAdminRequest()
    {
        $user_model = Users::model()->findByPk(Yii::app()->user->id);
        return $user_model ? $user_model->permissions : false;
    }
}