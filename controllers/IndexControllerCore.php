<?php

namespace PagesModule\Controller;

class IndexControllerCore extends \Host\Controller\BaseController
{
    public function indexAction()
    {
		//	set main view
		$this->view->setMainView('block-module-pages/index');
    }
}