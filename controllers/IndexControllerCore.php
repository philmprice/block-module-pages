<?php

namespace PagesModule\Controller;

class IndexControllerCore extends \Host\Controller\BaseController
{
    public function indexAction()
    {
    	//	init
    	$this->init();
    	
		//	set main view
		$this->view->setMainView('block-module-pages/index');
    }
}