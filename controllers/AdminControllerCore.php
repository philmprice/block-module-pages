<?php

namespace PagesModule\Controller;

class AdminControllerCore extends \Host\Controller\BaseController
{
    public function init()
    {
        //  base init
        parent::init();

        //  build menu
        $menuItemArray  = array();
        $moduleArray    = \Model\Module::find();
        foreach($moduleArray AS $module)
        {
            $menuItemArray[]    = array('label'     => $module->name,
                                        'link'      => ROOT.$module->adminUrl,
                                        'active'    => false);
        }
        $this->view->menuItemArray  = $menuItemArray;
    }

	//	index
    public function indexAction()
    {
    	//	init
    	$this->init();

        //  get pages
        $this->view->pageArray = \Model\Page::find();
    	
		//	set main view
		$this->view->setMainView('block-module-pages/admin-index');
    }

    //	create
    public function createAction()
    {
    	//	init
    	$this->init();
    	
		//	set main view
		$this->view->setMainView('block-module-pages/admin-create');
    }

    // update
    public function updateAction()
    {
    	//	init
    	$this->init();
    	
		//	set main view
		$this->view->setMainView('block-module-pages/admin-update');
    }

    //	delete
    public function deleteAction()
    {
    	//	init
    	$this->init();
    	
		//	set main view
		$this->view->setMainView('block-module-pages/admin-delete');
    }
}