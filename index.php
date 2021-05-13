<?php
define('DOT', '.');
require_once(DOT . "/bootstrap.php");

$Route = new Apps\Route;

//Home page//
$Route->add('/', function () {
	$Template = new Apps\Template;
	if(!$Template->auth){
		$Template->redirect("/site");
	}
}, 'GET');


require_once DOT . "/_public/myhq.php" ;
require_once DOT . "/_public/forms.php" ;


$Route->add('/logout', function () {
	$Template = new Apps\Template;
	$Template->expire();
	$Template->redirect("/myhq");
}, 'GET');




$Route->run('/');
