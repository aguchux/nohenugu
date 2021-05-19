<?php
define('DOT', '.');
require_once(DOT . "/bootstrap.php");

$Route = new Apps\Route;

//Home page//
$Route->add('/', function () {
	$Core = new Apps\Core;
	$Template = new Apps\Template;
	if (!$Template->auth) {
		$Template->redirect("/site");
	}
	$rootpage = $Core->getSiteInfo('defaultlandingpage');
	$PageInfo = $Core->PageInfo($rootpage);
	$Template->assign("title", "{$PageInfo->title}");
	$Template->assign("PageInfo", $PageInfo);
	$Template->addheader("layouts.website.header");
	$Template->addfooter("layouts.website.footer");
	$Template->render("home");
}, 'GET');


require_once DOT . "/_public/myhq.php";
require_once DOT . "/_public/forms.php";


$Route->add('/logout', function () {
	$Template = new Apps\Template;
	$Template->expire();
	$Template->redirect("/myhq");
}, 'GET');




$Route->run('/');
