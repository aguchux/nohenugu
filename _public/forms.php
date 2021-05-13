<?php


$Route->add('/ajax/{cmd}', function ($cmd) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;

	if ($cmd == 'login') {

		$Post = $Core->post($_POST);
		$username = $Post->username;
		$password = $Post->password;
		$Login = $Core->Login($username, $password);

		if ((int)$Login->accid) {
			$Template->data['accid'] = true;
			$Template->authorize($Login->accid);

			$Template->setError("Login was successful, welcom back {$Login->surname}", "success", "/myhq");

			$Template->data['myhq_logged_in'] = true;
			$Template->data['myhq_email'] = $username;
			$Template->data['UserInfo'] = $Core->UserInfo($Login->accid);
			$Template->save();
		}

		$Template->redirect("/myhq");
	} elseif ($cmd == 'add-page') {

		$Post = $Core->post($_POST);

		$category = "[]";
		if ($Post->category) {
			$category = $Post->category;
		}
		$category = json_encode($category);


		$shortname = $Post->shortname;
		$parent = $Post->parent;
		$title = $Post->title;
		$pagestyle = $Post->pagestyle;
		$menutitle = $Post->menutitle;
		$sort = $Post->sort;
		$isnews = $Post->isnews;
		$excerpt = $Post->excerpt;
		$contents = $Post->contents;
		$photos = "";

		if (isset($_FILES['newsphoto'])) {

			$handle = new Upload($_FILES['newsphoto']);
			$path = "{$Template->store}images/pages/{$shortname}/";
			if ($handle->uploaded) {
				$handle->file_new_name_body	= md5(time());
				$handle->image_resize	= true;
				$handle->image_x	= 120;
				$handle->image_ratio_y	= true;
				$handle->process($path);
				if ($handle->processed) {
					$photos = "{$path}{$handle->file_dst_name}";
					$handle->clean();
				} else {
					echo 'error : ' . $handle->error;
				}
			}
		}

		$created = $Core->CreatePage($parent, $menutitle, $title, $excerpt, $contents, $sort, $shortname, $isnews, $category, $photos);

		if ($created) {
			$Template->data['notify'] = $Core->notify("Wow lovely!", "The page has been successfully created");
			$Template->redirect("/myhq/edit-page/page/{$created}/{$shortname}");
		} else {
			$Template->data['notify'] = $Core->notify("Something Happened?", "The page could not be created");
			$Template->redirect("/myhq/add-page");
		}
	} elseif ($cmd == 'edit-page') {

		$Post = $Core->post($_POST);
		$pageid = $Post->pageid;

		$category = "[]";
		if ($Post->category) {
			$category = $Post->category;
		}
		$category = json_encode($category);

		$shortname = $Post->shortname;
		$parent = $Post->parent;
		$title = $Post->title;
		$pagestyle = $Post->pagestyle;
		$menutitle = $Post->menutitle;
		$sort = $Post->sort;
		$isnews = $Post->isnews;
		$excerpt = $Post->excerpt;
		$contents = $Post->contents;

		if (isset($_FILES['newsphoto'])) {

			$handle = new Upload($_FILES['newsphoto']);
			$path = "{$Template->store}images/pages/{$shortname}/";
			if ($handle->uploaded) {
				$handle->file_new_name_body	= md5(time());
				$handle->image_resize	= true;
				$handle->image_x	= 120;
				$handle->image_ratio_y	= true;
				$handle->process($path);
				if ($handle->processed) {
					$photos = "{$path}{$handle->file_dst_name}";
					$handle->clean();
				} else {
					echo 'error : ' . $handle->error;
				}
			}
			$updated = $Core->UpdatePageWithPhotos($pageid, $parent, $menutitle, $title, $excerpt, $contents, $sort, $shortname, $isnews, $category, $photos);
		} else {
			$updated = $Core->UpdatePage($pageid, $parent, $menutitle, $title, $excerpt, $contents, $sort, $shortname, $isnews, $category);
		}

		if ($updated) {
			$Template->data['notify'] = $Core->notify("Wow lovely!", "The page has been successfully updated.");
			$Template->save();
			$Template->redirect("/myhq/edit-page/page/{$pageid}/{$shortname}");
		} else {
			$Template->data['notify'] = $Core->notify("Something Happened?", "The changes on the page could not be saved.");
			$Template->save();
			$Template->redirect("/myhq/add-page");
		}
	} elseif ($cmd == 'delete-page') {

		$Post = $Core->post($_POST);

		$pid = $Post->pageid;
		$pageinfo = $Core->LoadPageInfo($pid);

		$delete = $Core->DeletePage($pid);

		if ($delete) {
			$Template->data['notify'] = $Core->notify("<strong>{$pageinfo->title}</strong> Deleted!", "The selected page has been successfully deleted");
		} else {
			$Template->data['notify'] = $Core->notify("Delete Error!", "The selected page could not be deleted. Kindly try again after a while...");
		}
		$Template->save();
		$Template->redirect("/myhq/pages");
	} elseif ($cmd == 'add-department') {

		$Post = $Core->post($_POST);

		$department = $Post->department;
		$description = $Post->description;
		$status = $Post->status;

		$added = $Core->AddDepartment($department, $description, $status);
		$Template->redirect("/myhq/departments");
	} elseif ($cmd == 'add-bed') {

		$Post = $Core->post($_POST);

		$ward = $Post->ward;
		$bed = $Post->bed;
		$status = $Post->status;

		$Db = new Apps\MysqliDb;
		$bedid = $Db->insert("noh_beds", [
			"ward" => $ward,
			"bed" => $bed,
			"enabled" => $status
		]);
		if ($bedid) {
			$Template->setError("A new bed was added successfully", "success", "/myhq/beds");
			$Template->redirect("/myhq/beds");
		}
		$Template->setError("Bed could not be added, try again", "danger", "/myhq/beds");
		$Template->redirect("/myhq/beds");
	} elseif ($cmd == 'add-doctor') {

		$Post = $Core->post($_POST);

		$email = $Post->email;
		$mobile = $Post->mobile;

		$echeck = $Core->UserInfo($email);
		$mcheck = $Core->UserInfo($mobile);


		if (($echeck->accid) || ($mcheck->accid)) {
			$Template->data['notify'] = $Core->notify("Email in use", "The email you entered has alread been registered to another doctor");
			$Template->save();
			$Template->redirect("/myhq/add-doctor");
		}

		$department = $Post->department;
		$firstname = $Post->firstname;
		$lastname = $Post->lastname;
		$password = $Post->password;
		$date_of_birth = $Post->date_of_birth;
		$date_of_birth_unix = strtotime($date_of_birth);
		$sex = $Post->sex;
		$department = $Post->department;
		$status = $Post->status;

		$roles = json_encode(array('user', 'doctor'));
		$added = $Core->AddDoctor($firstname, $lastname, $email, $password, $mobile, $department, $date_of_birth_unix, $status, $roles);

		if (isset($_FILES['picture']) && $added) {
			$handle = new Upload($_FILES['picture']);
			$path = "{$Template->store}images/accounts/{$added}/";
			if ($handle->uploaded) {
				$handle->file_new_name_body	= md5(time());
				$handle->image_resize	= true;
				$handle->image_x	= 120;
				$handle->image_ratio_y	= true;
				$handle->process($path);
				if ($handle->processed) {
					$photos = "{$path}{$handle->file_dst_name}";
					$handle->clean();
				} else {
					echo 'error : ' . $handle->error;
				}
			}
			$update = $Core->SetUserInfo($added, "profile_photo", $photos);
		}

		$Template->redirect("/myhq/doctors");
	} elseif ($cmd == 'add-patient') {

		$Post = $Core->post($_POST);

		$mobile = $Post->mobile;
		$email = $Post->email;
		$firstname = $Post->fn;
		$lastname = $Post->ln;
		$date_of_birth = $Post->date_of_birth;
		$date_of_birth_unix = strtotime($date_of_birth);
		$sex = $Post->sex;
		$status = $Post->status;

		$roles = json_encode(array('user', 'patient'));

		$added = $Core->AddPatient($firstname, $lastname, $email, $mobile, $date_of_birth_unix, $status, $roles);

		$Template->redirect("/myhq/patients");
	} elseif ($cmd == 'join') {
	}
}, 'POST');




$Route->add('/form/doctor/{accid}/{action}', function ($accid, $action) {
	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$data = $Core->post($_POST);
	$Db = new Apps\MysqliDb;
	switch ($action) {
		case 'edit':
			$done = $Db->where("accid", $accid)->update("noh_doctors", [
				"firstname" => $data->firstname,
				"lastname" => $data->lastname,
				"department" => $data->department,
				"sex" => $data->department,
				"enabled" => $data->status,
				"email" => $data->email,
				"date_of_birth" => $data->date_of_birth
			]);
			break;
		case 'delete':
			$del = $Db->where("accid", $accid)->delete("noh_doctors", 1);
			break;
	}
	$Template->redirect("/myhq/doctors");
}, 'POST');



$Route->add('/form/department/{id}/{action}', function ($id, $action) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$data = $Core->post($_POST);
	$Db = new Apps\MysqliDb;
	switch ($action) {
		case 'edit':
			$done = $Db->where("id", $id)->update("noh_departments", [
				"department" => $data->department,
				"description" => $data->description,
				"enabled" => $data->status
			]);
			break;
		case 'delete':
			$del = $Db->where("id", $id)->delete("noh_departments", 1);
			break;
	}
	$Template->redirect("/myhq/departments");
}, 'POST');


$Route->add('/form/bed/{id}/{action}', function ($id, $action) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$data = $Core->post($_POST);
	$Db = new Apps\MysqliDb;
	switch ($action) {
		case 'edit':
			$done = $Db->where("id", $id)->update("noh_beds", [
				"bed" => $data->bed,
				"ward" => $data->ward,
				"inuse" => $data->status	
			]);
			break;
		case 'delete':
			$del = $Db->where("id", $id)->delete("noh_beds", 1);
			break;
	}
	$Template->redirect("/myhq/beds");
}, 'POST');


$Route->add('/form/patient/{accid}/{action}', function ($accid, $action) {

	$Core = new Apps\Core;
	$Template = new Apps\Template;
	$data = $Core->post($_POST);
	$Db = new Apps\MysqliDb;
	switch ($action) {
		case 'edit':
			$done = $Db->where("accid", $accid)->update("noh_accounts", [
				"firstname" => $data->fn,
				"lastname" => $data->ln,
				"status" => $data->status,
				"address" => $data->address,
				"email" => $data->email,
				"sex" => $data->sex,
				"mobile" => $data->mobile,
				"date_of_birth" => $data->date_of_birth	
			]);
			break;
		case 'delete':
			$del = $Db->where("accid", $accid)->delete("noh_accounts", 1);
			break;
	}
	$Template->redirect("/myhq/patients");
}, 'POST');
