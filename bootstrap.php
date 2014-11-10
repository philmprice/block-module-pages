<?php

$blockVendor		= "philmprice";									//	github vendor name
$blockFolder        = "block-module-pages";							//	github project name (must start with 'block-module-')
$blockHandle		= str_replace('block-module-','',$blockFolder);
$blockUpperHandle	= handle2upperHandle($blockHandle);								
$blockNamespace		= $blockUpperHandle.'Module';

////////////////////////////
//  ROUTES

$indexControllerData = array(
    'controller'    => 'index',
    'action'        => 'index',
    'namespace'     => $blockNamespace.'\Controller'
);
$router->add("/pages", 	$indexControllerData);
$router->add("/pages/", $indexControllerData);

////////////////////////////
//  CLASSES

$loaderClassArray[$blockNamespace.'\Controller\IndexControllerCore']	= ABS_ROOT.CORE_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/controllers/IndexControllerCore.php';
$loaderClassArray[$blockNamespace.'\Controller\IndexController']		= ABS_ROOT.PROJ_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/controllers/IndexController.php';

$loaderClassArray[$blockNamespace.'\Object\FooCore']					= ABS_ROOT.CORE_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/php/objects/FooCore.php';
$loaderClassArray[$blockNamespace.'\Object\Foo']						= ABS_ROOT.PROJ_FOLDER.'/'.$blockVendor.'/'.$blockFolder.'/php/objects/Foo.php';

////////////////////////////
//  AUTOLOAD FOLDERS

$loaderDirArray[]   = '../../'.$blockFolder.'/models/';
$loaderDirArray[]   = '../../'.$blockFolder.'/php/objects/';

////////////////////////////
//  NAMESPACES

// $loaderNamespaceArray['BlockModule\Pages']	= "../../".$blockFolder."/php/objects/";