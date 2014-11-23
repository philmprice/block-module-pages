<?php

////////////////////////////
//  PATHS & NAMES

$blockVendor		= "philmprice";									//	github vendor name
$blockFolder        = "block-module-pages";							//	github project name (must start with 'block-module-')
$blockHandle		= str_replace('block-module-','',$blockFolder);
$blockUpperHandle	= handle2upperHandle($blockHandle);								
$blockNamespace		= $blockUpperHandle.'Module';

////////////////////////////
//  ENSURE EXTENSIONS

\Host\Object\ExtenderCore::extendFolderFile(HOST_ROOT.'/models/', 'NounCore.php');
\Host\Object\ExtenderCore::extendFolderFile(HOST_ROOT.'/models/', 'ModuleCore.php');

////////////////////////////
//  ROUTES

//	index
$indexControllerData = array(
    'controller'    => 'admin',
    'action'        => 'index',
    'namespace'     => $blockNamespace.'\Controller'
);
$router->add("/admin/".$blockHandle, 						$indexControllerData);
$router->add("/admin/".$blockHandle."/", 					$indexControllerData);

//	create
$indexControllerData = array(
    'controller'    => 'admin',
    'action'        => 'create',
    'namespace'     => $blockNamespace.'\Controller'
);
$router->add("/admin/".$blockHandle."/create", 				$indexControllerData);
$router->add("/admin/".$blockHandle."/create/", 			$indexControllerData);

//	update
$indexControllerData = array(
    'controller'    => 'admin',
    'action'        => 'update',
    'namespace'     => $blockNamespace.'\Controller'
);
$router->add("/admin/".$blockHandle."/update/{handle}", 	$indexControllerData);
$router->add("/admin/".$blockHandle."/update/{handle}/", 	$indexControllerData);

//	delete
$indexControllerData = array(
    'controller'    => 'admin',
    'action'        => 'delete',
    'namespace'     => $blockNamespace.'\Controller'
);
$router->add("/admin/".$blockHandle."/delete/{handle}", 	$indexControllerData);
$router->add("/admin/".$blockHandle."/delete/{handle}/", 	$indexControllerData);

// public website
$indexControllerData = array(
    'controller'    => 'public',
    'action'        => 'index',
    'namespace'     => $blockNamespace.'\Controller'
);
$router->add("/", 					$indexControllerData);
$router->add("/".$blockHandle, 		$indexControllerData);
$router->add("/".$blockHandle."/", 	$indexControllerData);

////////////////////////////
//  CLASSES

$loaderClassArray[$blockNamespace.'\Controller\AdminControllerCore']	= ABS_ROOT.CORE_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/controllers/AdminControllerCore.php';
$loaderClassArray[$blockNamespace.'\Controller\AdminController']		= ABS_ROOT.PROJ_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/controllers/AdminController.php';

$loaderClassArray[$blockNamespace.'\Controller\PublicControllerCore']	= ABS_ROOT.CORE_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/controllers/PublicControllerCore.php';
$loaderClassArray[$blockNamespace.'\Controller\PublicController']		= ABS_ROOT.PROJ_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/controllers/PublicController.php';

$loaderClassArray[$blockNamespace.'\Object\FooCore']					= ABS_ROOT.CORE_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/php/objects/FooCore.php';
$loaderClassArray[$blockNamespace.'\Object\Foo']						= ABS_ROOT.PROJ_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/php/objects/Foo.php';

$loaderClassArray['Model\PageCore']                                     = ABS_ROOT.CORE_FOLDER.'/'.$blockAuthor.'/'.$blockFolder.'/models/PageCore.php';
$loaderClassArray['Model\Page']                                         = ABS_ROOT.PROJ_FOLDER.'/'.$blockAuthor.'/'.$blockFolder.'/models/Page.php';

////////////////////////////
//  AUTOLOAD FOLDERS

$loaderDirArray[]   = '../../'.$blockFolder.'/models/';
$loaderDirArray[]   = '../../'.$blockFolder.'/php/objects/';

////////////////////////////
//  AUTOLOAD NAMESPACES

// $loaderNamespaceArray['BlockModule\Pages']   = "../../".$blockFolder."/php/objects/";

////////////////////////////
//  REFRESH
if(SERVER == 'dev' && isset($_GET['refreshAll']))
{
    ////////////////////////////
    //  REGISTER MENU ITEM

    $moduleData = array('uid'       => 'proto-pages',
                        'name'      => 'Pages',
                        'adminUrl'  => 'admin/pages/',
                        'publicUrl' => '');
    \Model\Module::register($moduleData);
}