<?php

if(debug){
	ini_set('display_errors', 1); 
	ini_set('display_startup_errors', 1); 
	error_reporting(E_ALL);
}

//Initialize the Config File
if(file_exists(DOT . '/config/config.php')){
	include(__DIR__ . '/config/config.php');

	require __DIR__ . '/vendor/autoload.php';

	$Route = new Apps\Route;
	$Core = new Apps\Core;
	$Template = new Apps\Template;
	
	if( $Template->auth){

		$Core->accid = $Template->data['accid'];
		$userinfo = $Core->UserInfo($Template->storage('accid'));
		$Template->store('userinfo',$userinfo);
		$Template->store('roles',json_decode($userinfo->roles));
		$Template->store("root",$userinfo->roots);	

	}
	
}else{
	die('config.php not found!');
}


