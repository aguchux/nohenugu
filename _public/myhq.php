

<?php

$Route->add('/myhq', function () {
	$Template = new Apps\Template('/myhq/login');
	$Template->addheader("layouts.myhq.header");
	$Template->addfooter("layouts.myhq.footer");
	$Template->assign("title", "NOHE.Admin");
	$roots = $Template->storage('root');
	$Template->render("myhq.{$roots}.myhq");
}, 'GET');


$Route->add('/myhq/login', function () {

	$Template = new Apps\Template;
	$Template->addheader("layouts.myhq.login.header");
	$Template->addfooter("layouts.myhq.login.footer");
	$Template->assign("title", "NOHE.Login");
	$Template->render("myhq.logon.login");

}, 'GET');



$Route->add('/myhq/{route}', function ($route) {

	$Core = new Apps\Core;
	$Template = new Apps\Template("/myhq/login");
	$Template->addheader("layouts.myhq.header");
	$Template->addfooter("layouts.myhq.footer");
	$Template->assign("title", "NOHE.Admin");

	$roots = $Template->storage('root');

	//Show Notifications//
	if (isset($Template->data['notify'])) {
		$Toast = $Core->Toast($Template->data['notify']);
		if ($Toast->id) {
			$Template->toast("{$Toast->title}", "{$Toast->notice}");
		}
	}
	//Show Notifications//

	if ($route == "pages") {
		$Template->assign("title", "Manage Pages");
		$Template->assign("pages", $Core->LoadPages());
		$Template->assign("title", "Manage Pages");
	} elseif ($route == "add-page") {
		$Template->assign("title", "Add Page");
		$Template->assign("parents", $Core->LoadParentMenus());
	} elseif ($route == "add-department") {
		$Template->assign("title", "Add Department");
	} elseif ($route == "departments") {
		$Template->assign("title", "All Departments");
		$Template->assign("departments", $Core->Departments());
	} elseif ($route == "doctors") {
		$Template->assign("title", "Manage Doctors");
		$Template->assign("doctors", $Core->Doctors());
	} elseif ($route == "add-doctor") {
		$Template->assign("title", "Add Doctor");
		$Template->assign("password", $Core->GenPassword());
		$Template->assign("departments", $Core->Departments());
	} elseif ($route == "patients") {
		$Template->assign("title", "Manage Patients");
		$Template->assign("patients", $Core->Patients());
	} elseif ($route == "add-patient") {
		$Template->assign("title", "Add Patient");
		$Template->assign("hid", $Core->GenHID());
		$Template->assign("departments", $Core->Departments());
	} elseif ($route == "add-bed") {
		$Template->assign("title", "Add Bed");
		$Template->assign("wards", $Core->Wards());
	} elseif ($route == "beds") {
		$Template->assign("title", "Manage Beds");
		$Template->assign("beds", $Core->Beds());
	} elseif ($route == "add-ward") {
		$Template->assign("title", "Add Ward");
	} elseif ($route == "wards") {
		$Template->assign("title", "Manage Wards");
		$Template->assign("wards", $Core->Wards());
	} elseif ($route == "add-appointment") {
		$Template->assign("title", "Add Appointment");
	} elseif ($route == "appointments") {
		$Template->assign("title", "Manage Appointments");
		$Template->assign("appointments", $Core->Appointments());
	}

	$Template->render("myhq.{$roots}.{$route}");


}, 'GET');



$Route->add('/myhq/{route}/page/{pid}/{shortname}', function ($route, $pid, $shortname) {

	$Core = new Apps\Core;
	$Template = new Apps\Template("/myhq/login");

	$Template->addheader("layouts.myhq.header");
	$Template->addfooter("layouts.myhq.footer");
	$Template->assign("title", "NOHE.Admin");

	$Template->assign("pid", $pid);
	$Template->assign("shortname", $shortname);

	$roots = $Template->storage('root');

	if ($route == "edit-page") {
		

		$parents = $Core->LoadParentMenus();
		$pageinfo = $Core->LoadPageInfo($shortname);
		$Template->assign("pageinfo", $pageinfo);
		$Template->assign("parents", $parents);
		
		$cat = json_decode($pageinfo->categories);

		$Template->assign("cat", $cat);
		

	} elseif ($route == "delete-page") {

		$pageinfo = $Core->LoadPageInfo($shortname);
		$Template->assign("pageinfo", $pageinfo);

	}

	$Template->render("myhq.{$roots}.{$route}");

}, 'GET');






