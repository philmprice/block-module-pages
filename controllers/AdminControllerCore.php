<?php

namespace PagesModule\Controller;

class AdminControllerCore extends \Host\Controller\BaseController
{
	//	index
    public function indexAction()
    {
    	//	init
    	$this->init();
    	
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