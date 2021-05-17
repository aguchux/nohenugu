<?php

//Write your custome class/methods here
namespace Apps;

use \Apps\Model;
use \Apps\Session;
use \Verot\UploadFiles;

class Core extends Model
{

	public $token = NULL;
	public $accid = NULL;
	public $toast = false;

	public function __construct()
	{
		parent::__construct();
	}

	public function GenPassword($length = 6)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function Passwordify($password)
	{
		$Passwordify = md5($password);
		return $Passwordify;
	}

	public function ToMoney($amount)
	{
		$amount = number_format($amount, 2, ".", ",");
		return "₦ " . $amount;
	}


	public function cleanup($text)
	{
		$text = preg_replace('/[\t\n\r\0\x0B]/', '', $text);
		$text = preg_replace('/([\s])\1+/', ' ', $text);
		$text = trim($text);
		return strtolower($text);
	}

	public function PostType($haystack, $i = "i", $word = "W")
	{
		$needle_need = "i need";
		$needle_have = "i have";
		if (strtoupper($word) == "W") {   // if $word is "W" then word search instead of string in string search.
			if (preg_match("/\b{$needle_need}\b/{$i}", $haystack)) {
				return "buying";
			}
			if (preg_match("/\b{$needle_have}\b/{$i}", $haystack)) {
				return "selling";
			}
		} else {
			if (preg_match("/{$needle_need}/{$i}", $haystack)) {
				return "buying";
			}
			if (preg_match("/{$needle_have}/{$i}", $haystack)) {
				return "selling";
			}
		}
		return "others";
		// Put quotes around true and false above to return them as strings instead of as bools/ints.
	}

	public function Login($username, $password)
	{
		$Login = mysqli_query($this->dbCon, "select * from noh_accounts where username='$username' AND password='$password'");
		$Login = mysqli_fetch_object($Login);
		return $Login;
	}

	public function AddMSG($chatid, $request, $sender, $msg)
	{
		$this->query("insert into whatsapp(chatid,request,sender,msg) value('$chatid','$request','$sender','$msg')");
		return $this->getLastId();
	}

	public function dodurl($json)
	{
		$curl = curl_init('https://eu65.chat-api.com/instance73421/sendMessage?token=oo94khg3bakui54h');
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($curl);
		return $result;
	}


	public static function slugify($string)
	{
		$table = array(
			'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
			'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
			'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
			'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
			'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
			'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-', '&' => 'and'
		);
		// -- Remove duplicated spaces
		$stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/', '/[^a-z0-9]/i'), ' ', $string);
		// -- Returns the slug
		return strtolower(strtr($string, $table));
	}



	public function UserExists($username)
	{
		$UserExists = mysqli_query($this->dbCon, "SELECT count(accid) AS cnt FROM noh_accounts WHERE (username='$username' OR email='$username')");
		$UserExists = mysqli_fetch_object($UserExists);
		return (int)$UserExists->cnt;
	}



	public function UserInfo($accid)
	{
		$UserInfo = mysqli_query($this->dbCon, "select * from noh_accounts where accid='$accid'");
		$UserInfo = mysqli_fetch_object($UserInfo);
		return $UserInfo;
	}

	public function HasRole($role = 'user')
	{
		$UInfo = $this->UserInfo($this->accid);
		$roles = json_decode($UInfo->roles);
		if (in_array($role, $roles)) {
			return true;
		}
		return false;
	}


	public function SetUserInfo($accid, $key, $val)
	{
		$SetUserInfo = mysqli_query($this->dbCon, "UPDATE noh_accounts SET $key='$val' where accid='$accid' OR email='$accid'");
		return mysqli_affected_rows($this->dbCon);
	}

	public function ListPages()
	{
		$ListPages = mysqli_query($this->dbCon, "select * from noh_pages order by sort ASC");
		return $ListPages;
	}

	public function GetParentMenuName($pname)
	{
		$val = '';
		$result = mysqli_query($this->dbCon, "select menutitle,shortname from noh_pages where shortname='$pname' LIMIT 0,1");
		$pnm = mysqli_fetch_array($result);
		$val = $pnm['menutitle'];
		if ($val) {
			return $val;
		} else {
			return "Top Menu (Home)";
		}
	}
	public function LoadPageInfo($shortname)
	{
		$results = mysqli_query($this->dbCon, "select * from noh_pages where shortname='$shortname' OR pageid='$shortname' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	public function PageInfo($shortname)
	{
		$results = mysqli_query($this->dbCon, "select * from noh_pages where shortname='$shortname' OR pageid='$shortname' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	public function DeletePage($pid)
	{
		$result = mysqli_query($this->dbCon, "delete noh_pages.* from noh_pages where pageid='$pid' OR shortname='$pid'");
		return $result;
	}

	public function CreatePage($parent, $menutitle, $title, $excerpt, $content, $sort, $shortname, $isnews, $category, $photos)
	{
		$this->query("insert into noh_pages(parent,menutitle,title,excerpt,content,sort,shortname,isnews,categories,photo) value('$parent','$menutitle','$title','$excerpt','$content','$sort','$shortname','$isnews','$category','$photos')");
		return $this->getLastId();
	}


	public function CreateLayoutPage($parent, $menutitle, $title, $sort, $shortname, $isnews, $pagestyle, $category, $photos)
	{
		$this->query("insert into noh_pages(parent,menutitle,title,sort,shortname,isnews,pagestyle,categories,photo,is_layout) value('$parent','$menutitle','$title','$sort','$shortname','$isnews','$pagestyle','$category','$photos','1')");
		return $this->getLastId();
	}

	public function AddWard($ward, $description, $status)
	{
		$this->query("insert into noh_wards(ward,description,enabled) value('$ward','$description','$status')");
		return $this->getLastId();
	}
	public function WardInfo($id)
	{
		$WardInfo = mysqli_query($this->dbCon, "select * from noh_wards where id='$id'");
		$WardInfo = mysqli_fetch_object($WardInfo);
		return $WardInfo;
	}

	public function UpdatePage($xpid, $parent, $menutitle, $title, $excerpt, $content, $sort, $shortname, $isnews, $category)
	{
		$result = mysqli_query($this->dbCon, "update noh_pages set parent='$parent',menutitle='$menutitle',title='$title',excerpt='$excerpt',content='$content',sort='$sort',shortname='$shortname',isnews='$isnews',categories='$category' where pageid='$xpid'");
		if ($result) {
			return $xpid;
		} else {
			return 0;
		}
	}

	public function UpdatePageWithPhotos($xpid, $parent, $menutitle, $title, $excerpt, $content, $sort, $shortname, $isnews, $category, $photos)
	{
		$result = mysqli_query($this->dbCon, "update noh_pages set parent='$parent',menutitle='$menutitle',title='$title',excerpt='$excerpt',content='$content',sort='$sort',shortname='$shortname',isnews='$isnews',categories='$category',photo='$photos' where pageid='$xpid'");
		if ($result) {
			return $xpid;
		} else {
			return 0;
		}
	}

	public function LoadArticles($limit = 1000)
	{
		$result = mysqli_query($this->dbCon, "select * from noh_pages where isnews='YES' ORDER BY created DESC LIMIT 0,$limit");
		return $result;
	}

	public function LoadPages()
	{
		return mysqli_query($this->dbCon, "select * from noh_pages order by sort ASC");
	}

	public function CountMenuPages()
	{
		$this->query("select pageid from noh_pages where parent='home'");
		return $this->countAffected();
	}
	public function LoadSubMenus($shn)
	{
		return mysqli_query($this->dbCon, "select * from noh_pages where parent='$shn'");
	}

	public function CountSubMenus($shn)
	{
		$this->query("select pageid from noh_pages where parent='$shn'");
		return $this->countAffected();
	}

	public function LoadParentMenus()
	{
		$result = mysqli_query($this->dbCon, "select pageid,menutitle,parent,shortname,isnews from noh_pages where parent='home' AND isnews='NO' ORDER BY sort ASC");
		return $result;
	}

	public function Notify($title, $notice)
	{
		$this->query("insert into noh_error_notifications(title,notice) value('$title','$notice')");
		return $this->getLastId();
	}

	public function Toast($id)
	{
		$Toast = mysqli_query($this->dbCon, "select * from noh_error_notifications where id='$id'");
		$Toast = mysqli_fetch_object($Toast);
		$cl_toast = new \stdClass;
		if (isset($Toast->id)) {
			$this->toast = true;
			$cl_toast->title = $Toast->title;
			$cl_toast->notice = $Toast->notice;
			//$del = $this->DeleteToast($id);
		} else {
			$Session = new Session();
			$Session->removedata("notify");
			$this->toast = false;
		}
		return $cl_toast;
	}

	public function DeleteToast($id)
	{
		$result = mysqli_query($this->dbCon, "delete noh_error_notifications.* from noh_error_notifications where id='$id'");
		return $result;
	}

	public function AddDepartment($department, $description, $status = 1)
	{
		$this->query("insert into noh_departments(department,description,enabled) value('$department','$description','$status')");
		return $this->getLastId();
	}

	public function Departments()
	{
		$result = mysqli_query($this->dbCon, "select * from noh_departments where enabled='1' ORDER BY created DESC");
		return $result;
	}

	public function LoadDepartmentsToSelect($depid = 0)
	{
		$html = "";
		$LoadDepartmentsToSelect = mysqli_query($this->dbCon, "select * from noh_departments");
		while ($departments = mysqli_fetch_object($LoadDepartmentsToSelect)) {
			if ($departments->id == $depid) {
				$html .= "<option value=\"{$departments->id}\" selected>{$departments->department}</option>";
			} else {
				$html .= "<option value=\"{$departments->id}\">{$departments->department}</option>";
			}
		}
		return $html;
	}
	public function GetDepartment($id)
	{
		$result = mysqli_query($this->dbCon, "select * from noh_departments where id='$id'");
		$result = mysqli_fetch_object($result);
		return $result;
	}

	public function Doctors()
	{
		$result = mysqli_query($this->dbCon, "select * from noh_accounts where roles LIKE '%doctor%' ORDER BY created DESC");
		return $result;
	}

	public function AddDoctor($fn, $ln, $email, $password, $mobile, $department, $dob, $sex, $status = 0, $roles = "['user','doctor']")
	{
		$this->query("insert into noh_accounts(firstname,lastname,username,email,password,mobile,department,dob,sex,enabled,roles,roots) value('$fn','$ln','$email','$email','$password','$mobile','$department','$dob','$sex','$status','$roles','doctors')");
		return $this->getLastId();
	}



	public function GenHID($length = 6)
	{
		$accids = mysqli_query($this->dbCon, "select count(*) as nums from noh_accounts");
		$accids = mysqli_fetch_object($accids);
		$nums = ++$accids->nums;
		$nums = str_pad($nums, $length, "0", STR_PAD_LEFT);
		return $nums;
	}

	public function SetupHID($hid, $accid, $lastseen)
	{
		$lastseen = time();
		$this->query("INSERT INTO noh_hids(hid,accid,last_seen) VALUES('$hid','$accid','$lastseen') ");
		return md5($this->getLastId() . $hid . $accid);
	}

	public function Patients()
	{
		$result = mysqli_query($this->dbCon, "select * from noh_accounts where roles LIKE '%patient%' ORDER BY created DESC");
		return $result;
	}

	public function AddPatient($username, $password, $fn, $ln, $email, $mobile, $dob, $status = 0, $sex, $roles = "['user','patient']",$address)
	{
		$this->query("INSERT INTO noh_accounts(username,password,firstname,lastname,email,mobile,dob,enabled,sex,roles,address) VALUES('$username','$password','$fn','$ln','$email','$mobile','$dob','$status','$sex','$roles','$address')");
		$accid =  $this->getLastId();
		return $accid;
	}

	public function GetHID($accid)
	{
		$GetHID = mysqli_query($this->dbCon, "select * from noh_hids where accid='$accid'");
		$GetHID = mysqli_fetch_object($GetHID);
		return $GetHID->hid;
	}


	public function Wards()
	{
		$result = mysqli_query($this->dbCon, "select * from noh_wards where enabled='1' ORDER BY created DESC");
		return $result;
	}

	public function GetWard($id)
	{
		$result = mysqli_query($this->dbCon, "select * from noh_wards where id='$id'");
		$result = mysqli_fetch_object($result);
		return $result;
	}

	public function AddBed($ward, $bed, $status = 1)
	{
		$this->query("insert into noh_beds(ward,bed,enabled) value('$ward','$bed','$status')");
		return $this->getLastId();
	}

	public function Beds()
	{
		$result = mysqli_query($this->dbCon, "select * from noh_beds where enabled='1' ORDER BY created DESC");
		return $result;
	}

	public function AddAppointment($date, $status = 1)
	{
		$this->query("insert into noh_appointments(date,enabled) value('$date','$status')");
		return $this->getLastId();
	}

	public function Appointments()
	{
		$result = mysqli_query($this->dbCon, "SELECT * FROM noh_appointments");
		return $result;
	}





































	function CreateNews($title, $contents, $linked)
	{
		$this->query("insert into news(title,news,linked) values('$title','$contents','$linked') ");
		return $this->getLastId();
	}
	function LoadBanners()
	{
		return mysqli_query($this->dbCon, "select * from photos where isbanner='1' order by created ASC");
	}
	function CreatePhotos($photo, $title, $photo_path, $isbanner, $group)
	{
		$this->query("insert into photos(name,title,type_dir,isbanner,groupid) values('$photo','$title','$photo_path','$isbanner','$group')");
		return $this->getLastId();
	}

	function LoadNews($limit = 1000)
	{
		return mysqli_query($this->dbCon, "select * from news order by created DESC LIMIT 0,{$limit}");
	}

	function GetPhoto($phid)
	{
		$results = mysqli_query($this->dbCon, "select * from photos where id='$phid' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	function GetPhotosByGroupId($groupid)
	{
		$results = mysqli_query($this->dbCon, "select * from photos where groupid='$groupid'");
		return $results;
	}
	function LoadPhotoGroup()
	{
		$results = mysqli_query($this->dbCon, "select * from photos_group");
		return $results;
	}
	function CreatePhotoGroup($title)
	{
		$this->query("insert into photos_group(title) values('$title') ");
		return $this->getLastId();
	}
	function GetPhotoGroup($gid)
	{
		$results = mysqli_query($this->dbCon, "select * from photos_group where grid='$gid' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	function DeletePhotoGroup($gid)
	{
		$result = mysqli_query($this->dbCon, "delete photos_group.* from photos_group where gid='$gid'");
		return $result;
	}
	function DeletePhoto($pid)
	{
		$result = mysqli_query($this->dbCon, "delete photos.* from photos where id='$pid'");
		return $result;
	}
	function DeleteSponsor($sid)
	{
		$result = mysqli_query($this->dbCon, "delete sponsor.* from sponsor where sid='$sid'");
		return $result;
	}
	function DeleteNews($nid)
	{
		$result = mysqli_query($this->dbCon, "delete news.* from news where nid='$nid'");
		return $result;
	}
	function CreateSponsor($name, $website, $profile)
	{
		$this->query("insert into sponsor(name,website,profile) values('$name','$website','$profile') ");
		return $this->getLastId();
	}

	function LoadSponsors($limit = 1000)
	{
		return mysqli_query($this->dbCon, "select * from sponsor order by created DESC LIMIT 0,{$limit}");
	}

	function LoadVideo($limit = 1000)
	{
		$result = mysqli_query($this->dbCon, "select * from videos order by created DESC LIMIT 0,{$limit}");
		return $result;
	}
	function CreateVideo($title, $path)
	{
		$this->query("insert into videos(title,path) values('$title','$path') ");
		return $this->getLastId();
	}
	function DeleteVideo($vid)
	{
		$result = mysqli_query($this->dbCon, "delete videos.* from videos where vid='$vid'");
		return $result;
	}




	public  function SiteInfos()
	{
		$SiteInfos = mysqli_query($this->dbCon, "SELECT * FROM noh_settings");
		return $SiteInfos;
	}

	public  function getSiteInfo($name)
	{
		$getSiteInfo = mysqli_query($this->dbCon, "SELECT `value` FROM noh_settings WHERE name='$name'");
		$getSiteInfo = mysqli_fetch_object($getSiteInfo);
		return $getSiteInfo->value;
	}

	public  function setSiteInfo($name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE noh_settings SET value='$value' WHERE name='$name'");
		return $this->countAffected();
	}


	function LoadSiteInfo($appid)
	{
		$results = mysqli_query($this->dbCon, "select * from siteinfo where appid='$appid' LIMIT 0,1");
		$result = mysqli_fetch_object($results);
		return $result;
	}
	function SaveCategory($appid, $cat_num, $cateval)
	{
		$result = mysqli_query($this->dbCon, "update siteinfo set $cat_num='$cateval' where appid='$appid'");
		return false;
	}
	function LoadCategories()
	{
		$result = mysqli_query($this->dbCon, "select cat1,cat2,cat3 from siteinfo where appid='$this->appid'");
		return $result;
	}
	function LoadPagesCat($cat)
	{
		$pages =  mysqli_query($this->dbCon, "select * from noh_pages where categories LIKE '%$cat%' order by sort ASC");
		return $pages;
	}
	function SaveHomePageTitleandSlogan($title, $slogan)
	{
		$result = mysqli_query($this->dbCon, "update siteinfo set title='$title',slogan='$slogan' where appid='1'");
		return $result;
	}

	function CreateNewTab($title, $contents, $path, $linked)
	{
		$this->query("insert into tabs(tabtitle,tabtext,tabimage,linkedpage) values('$title','$contents','$path','$linked') ");
		return $this->getLastId();
	}
	function LoadTabs()
	{
		return mysqli_query($this->dbCon, "select * from tabs order by created DESC");
	}

	function LoadThreeTabs()
	{
		return mysqli_query($this->dbCon, "select * from tabs order by rand() LIMIT 0,3");
	}

	function LoadAllBanners($limit = 100)
	{
		return mysqli_query($this->dbCon, "select * from banners order by created DESC LIMIT 0,$limit");
	}

	function LoadThisTab($tabid)
	{
		$tabs = mysqli_query($this->dbCon, "select * from tabs where tabid='$tabid' LIMIT 0,1");
		$tab = mysqli_fetch_object($tabs);
		return $tab;
	}
	function DeleteTab($tid)
	{
		$result = mysqli_query($this->dbCon, "delete tabs.* from tabs where tabid='$tid'");
		return $result;
	}
	function EditTab($tabid, $title, $contents, $path, $linked, $hasImage)
	{
		if ($hasImage == "YES") {
			$this->query("update tabs set tabtitle='$title',tabtext='$contents',tabimage='$path',linkedpage='$linked' where tabid='$tabid'");
		} elseif ($hasImage == "NO") {
			$this->query("update tabs set tabtitle='$title',tabtext='$contents',linkedpage='$linked' where tabid='$tabid'");
		}
		return $this->countAffected();
	}

















	public function Register($email, $mobile)
	{
		$password = $this->GenPassword();
		$passkey = md5(sha1($password));
		$activator = sha1($passkey . $passkey);
		$Register = mysqli_query($this->dbCon, "insert into cob_members(email,mobile,password,passkey,activator) values('$email','$mobile','$password','$passkey','$activator')");
		return mysqli_insert_id($this->dbCon);
	}

	public function KYCInfo($accid)
	{
		$KYCInfo = mysqli_query($this->dbCon, "select * from cob_kycs where accid='$accid'");
		if (!$KYCInfo->id) {
			mysqli_query($this->dbCon, "INSERT INTO cob_kycs(accid) values('$accid')");
			$KYCInfo = mysqli_query($this->dbCon, "select * from cob_kycs where accid='$accid'");
		}
		$KYCInfo = mysqli_fetch_object($KYCInfo);
		return $KYCInfo;
	}


	public function SetUserKYC($accid, $key, $val)
	{
		$kyc = $this->KYCInfo($accid);
		$SetUserInfo = mysqli_query($this->dbCon, "UPDATE cob_kycs SET $key='$val' where accid='$accid'");
		return mysqli_affected_rows($this->dbCon);
	}

	public function DoKYC($accid, $kycs)
	{
		$KYCInfo = $this->KYCInfo($accid);
		$var_kyc = explode(",", $kycs);
		foreach ($var_kyc as $kyc) {
			$this->SetUserKYC($accid, $kyc, 1);
		}
		$KYCInfo = $this->KYCInfo($accid);
		return $KYCInfo;
	}


	// PHP Email //	
	public function newMail($email, $name, $subject, $html)
	{

		try {
			$PHPmailer = new PHPMailer(true);
			$PHPmailer->AddAddress($email, $name);

			$PHPmailer->setFrom("sales@crowdcob.com", "Auth@CrowdCOB");
			$PHPmailer->AddReplyTo("sales@crowdcob.com", "Auth@CrowdCOB");
			//$PHPmailer->ReturnPath( "bounced@crowdcob.com","Bounced@crowdcob" );

			$PHPmailer->Subject = $subject;

			//$PHPmailer->DKIM_domain = 'crowdcob.com';
			//$PHPmailer->DKIM_private = ROOT . "/etc/_DKIM/private.key";
			//$PHPmailer->DKIM_selector = '1513355176.vetuweb';
			//$PHPmailer->DKIM_passphrase = '';
			//$PHPmailer->DKIM_identity = $PHPmailer->From;

			$PHPmailer->isHTML(true);

			$body = "{$html}";
			$PHPmailer->MsgHTML($body);

			$PHPmailer->Encoding = "base64";

			$sent = $PHPmailer->Send();
			return $sent;
		} catch (phpmailerException $e) {
			return $sent;
		} catch (\Exception $e) {
			return $sent;
		}
	}




































	public function Accounts()
	{
		$Accounts = mysqli_query($this->dbCon, "select * from vig_members WHERE vid='$this->VID'");
		return $Accounts;
	}

	public function GetHouse($house)
	{
		$GetHouse = mysqli_query($this->dbCon, "select * from vig_houses where hid='$house' AND vid='$this->VID'");
		$GetHouse = mysqli_fetch_object($GetHouse);
		return $GetHouse;
	}

	public function GetStreet($street)
	{
		$GetStreet = mysqli_query($this->dbCon, "select * from vig_streets where sid='$street' AND vid='$this->VID'");
		$GetStreet = mysqli_fetch_object($GetStreet);
		return $GetStreet;
	}

	public function LoadStreetsToSelect($sid = 0)
	{
		$html = "";
		$LoadStreetsToSelect = mysqli_query($this->dbCon, "select * from vig_streets WHERE vid='$this->VID'");
		while ($street = mysqli_fetch_object($LoadStreetsToSelect)) {
			if ($street->sid == $sid) {
				$html .= "<option value=\"{$street->sid}\" selected>{$street->name}</option>";
			} else {
				$html .= "<option value=\"{$street->sid}\">{$street->name}</option>";
			}
		}
		return $html;
	}

	public function Streets()
	{
		$Streets = mysqli_query($this->dbCon, "select * from vig_streets WHERE vid='$this->VID'");
		return $Streets;
	}

	public function ThisTheme($tid)
	{
		$ThisTheme = mysqli_query($this->dbCon, "select * from themes where tid='$tid' AND vid='$this->VID'");
		$ThisTheme = mysqli_fetch_object($ThisTheme);
		return $ThisTheme;
	}

	public function AccountSetup($account_type, $street, $surename, $othernames, $mobile, $gender, $features, $house)
	{
		$AccountSetup = mysqli_query($this->dbCon, "insert into vig_members(vid,account_type,street,surname,othernames,mobile,sex,features,house) values('$this->VID','$account_type','$street','$surename','$othernames','$mobile','$gender','$features','$house')");
		return $AccountSetup;
	}

	public function AccountSave($accid, $account_type, $street, $surename, $othernames, $mobile, $gender, $features, $house)
	{
		$AccountSave = mysqli_query($this->dbCon, "update vig_members set vid='$this->VID',account_type='$account_type',street='$street',surname='$surename',othernames='$othernames',mobile='$mobile',sex='$gender',features='$features',house='$house' WHERE accid='$accid'");
		return $AccountSave;
	}

	public function AccountUpload($account_type, $title, $surename, $othernames, $mobile, $gender, $features, $street)
	{
		$AccountUpload = mysqli_query($this->dbCon, "insert into vig_members(vid,account_type,title,surname,othernames,mobile,sex,features,street) values('$this->VID','$account_type','$title','$surename','$othernames','$mobile','$gender','$features','$street')");
		return $AccountUpload;
	}

	public function StreetSetup($street, $landmark)
	{
		$StreetSetup = mysqli_query($this->dbCon, "insert into vig_streets(vid,name,landmark) values('$this->VID','$street','$landmark')");
		return $StreetSetup;
	}

	public function StreetUpload($street, $landmark)
	{
		$StreetUpload = mysqli_query($this->dbCon, "insert into vig_streets(vid,name,landmark) values('$this->VID','$street','$landmark')");
		return $StreetUpload;
	}


	public function SaveTheme($tid, $tkey, $tval)
	{
		$SaveTheme = mysqli_query($this->dbCon, "UPDATE themes SET $tkey='$tval' where tid='$tid'");
		return $SaveTheme;
	}

	public function CountAcc($type = 'Tenant')
	{
		$CountAcc = mysqli_query($this->dbCon, "select * from vig_members where account_type='$type' AND vid='$this->VID'");
		$CountAcc = mysqli_num_rows($CountAcc);
		return (int)$CountAcc;
	}

	public function Payments()
	{
		$Payments = mysqli_query($this->dbCon, "select * from vig_payments WHERE vid='$this->VID'");
		return $Payments;
	}

	public function LevyRevenue($levy)
	{
		$LevyRevenue = mysqli_query($this->dbCon, "SELECT SUM(amount) AS tlevy FROM vig_payments WHERE levy='$levy' AND vid='$this->VID'");
		$LevyRevenue = mysqli_fetch_object($LevyRevenue);
		return $LevyRevenue->tlevy;
	}

	public function Levies()
	{
		$Levies = mysqli_query($this->dbCon, "select * from vig_levies WHERE vid='$this->VID'");
		return $Levies;
	}

	public function LoadLeviesToSelect($lid = 0)
	{
		$html = "";
		$LoadLeviesToSelect = mysqli_query($this->dbCon, "select * from vig_levies WHERE vid='$this->VID'");
		while ($levi = mysqli_fetch_object($LoadLeviesToSelect)) {
			if ($levi->lid == $lid) {
				$html .= "<option value=\"{$levi->lid}\" selected>{$levi->title}</option>";
			} else {
				$html .= "<option value=\"{$levi->lid}\">{$levi->title}</option>";
			}
		}
		return $html;
	}


	public function CheckLevyPayment($accid, $levy)
	{
		$CheckLevyPayment = mysqli_query($this->dbCon, "select * from vig_payments where (accid='$accid' AND levy='$levy') AND vid='$this->VID'");
		$CheckLevyPayment = mysqli_fetch_object($CheckLevyPayment);
		return $CheckLevyPayment;
	}

	public function NewLevy($levy, $amount, $starts, $ends)
	{
		$NewLevy = mysqli_query($this->dbCon, "insert into vig_levies(vid,title,amount,starts,ends) values('$this->VID','$levy','$amount','$starts','$ends')");
		return $NewLevy;
	}

	function NewLevyPayment($levy, $accid, $amount, $method)
	{
		$NewLevyPayment = mysqli_query($this->dbCon, "insert into vig_payments(vid,accid,levy,amount,method) values('$this->VID','$accid','$levy','$amount','$method')");
		return $NewLevyPayment;
	}

	public function AccountLevies()
	{
		$Levies = mysqli_query($this->dbCon, "select * from vig_levies WHERE vid='$this->VID'");
		return $Levies;
	}

	public function CountResidents($street)
	{
		$CountResidents = mysqli_query($this->dbCon, "select * from vig_members where street='$street' AND vid='$this->VID'");
		$CountResidents = mysqli_num_rows($CountResidents);
		return (int)$CountResidents . " Residents";
	}

	public function Residents($street)
	{
		$Residents = mysqli_query($this->dbCon, "select * from vig_members where street='$street' AND vid='$this->VID'");
		return $Residents;
	}



	public function DeleteUser($accid)
	{
		$DeleteUser = mysqli_query($this->dbCon, "DELETE vig_members.* from vig_members WHERE accid='$accid'");
		return $DeleteUser;
	}




	public  function setWebPartInfo($webpartid, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE noh_webparts SET `$name`='$value' WHERE id='$webpartid'");
		return $this->countAffected();
	}

	public  function WebPartHeader($phpfile = "")
	{
		$PHPfile = file_get_contents($phpfile);
		preg_match('/^Name:[^\r\n]*/m', $PHPfile, $matches);
		$result = explode(":", $matches[0]);
		return $result[1];
	}


	public function PageWebParts($pageid = 1000)
	{
		$PageWebParts = mysqli_query($this->dbCon, "SELECT * FROM noh_webparts WHERE page='$pageid' ORDER BY sort ASC");
		return $PageWebParts;
	}

	public function CountPagedWebParts($webpart)
	{
		mysqli_query($this->dbCon, "SELECT id FROM noh_webparts WHERE webpart='$webpart'");
		return (int) $this->countAffected();
	}


	public function CountPageWebParts($pageid)
	{
		mysqli_query($this->dbCon, "SELECT id FROM noh_webparts WHERE page='$pageid'");
		return (int) $this->countAffected();
	}












	// DATI ADMIN//

	public function setEditable()
	{
		$Session = new Session;
		if (isset($Session->data['logged_in'])) {
			return ' editable';
		}
		return null;
	}

	public function Editable()
	{
		$Session = new Session;
		if (isset($Session->data['logged_in'])) {
			return ' editable';
		}
		return null;
	}

	public function AdminListPages()
	{
		$AdminListPages = mysqli_query($this->dbCon, "SELECT * FROM noh_pages WHERE homepage='0' ");
		return $AdminListPages;
	}

	public function AddView($page)
	{
		$AddView = mysqli_query($this->dbCon, "UPDATE noh_pages SET `views` = (`views` + 1) WHERE id='$page'");
		return $this->countAffected();
	}

	public function Articles()
	{
		$Articles = mysqli_query($this->dbCon, "SELECT * FROM noh_pages WHERE type='blog'");
		return $Articles;
	}

	public function ServicePages()
	{
		$ServicePages = mysqli_query($this->dbCon, "SELECT * FROM noh_pages WHERE type='services'");
		return $ServicePages;
	}

	public function Blogs($limit = 0)
	{
		if ($limit) {
			$Blogs = mysqli_query($this->dbCon, "SELECT * FROM noh_pages WHERE type='blog' ORDER BY RAND() LIMIT $limit");
		} else {
			$Blogs = mysqli_query($this->dbCon, "SELECT * FROM noh_pages WHERE type='blog'");
		}
		return $Blogs;
	}

	public  function GetNextSort()
	{
		$GetNextSort = mysqli_query($this->dbCon, "SELECT count(pageid) AS cnt FROM noh_pages");
		$GetNextSort = mysqli_fetch_object($GetNextSort);
		if (isset($GetNextSort->cnt)) {
			return (int) $GetNextSort->cnt + 1;
		}
		return 1;
	}

	public  function HasPages($page)
	{
		$HasPages = mysqli_query($this->dbCon, "SELECT count(id) AS cnt FROM noh_pages WHERE parent='$page'");
		$HasPages = mysqli_fetch_object($HasPages);
		return $HasPages->cnt;
	}

	public  function SubPages($parent)
	{
		$SubPages = mysqli_query($this->dbCon, "SELECT * FROM noh_pages WHERE parent='$parent' ORDER BY sort ASC");
		return $SubPages;
	}

	public  function setBG($url)
	{
		$htm = "";
		$htm .= "style=\"background: url({$url}) no-repeat center center / cover;\"";
		return $htm;
	}


	public function Galleries()
	{
		$Galleries = mysqli_query($this->dbCon, "SELECT * FROM noh_photos");
		return $Galleries;
	}


	public  function  GalleryInfo($photoid)
	{
		$GalleryInfo = mysqli_query($this->dbCon, "SELECT * FROM noh_photos WHERE id='$photoid'");
		$GalleryInfo = mysqli_fetch_object($GalleryInfo);
		return $GalleryInfo;
	}


	public function Upload($FileDir, $fileObj, $height = 1000, $width = 1000)
	{
		$handle = new  Upload($fileObj);
		if ($handle->uploaded) {
			$handle->file_new_name_body = sha1($FileDir  . $height .  time());

			$handle->dir_auto_create = true;
			$handle->image_resize	= true;
			$handle->image_y	= $height;
			$handle->image_x	= $width;
			$handle->file_overwrite = true;
			$handle->dir_chmod = 0777;
			$handle->image_ratio = true;

			$handle->process($FileDir);
			if ($handle->processed) {
				return $handle->file_dst_pathname;
				$handle->clean();
			} else {
				return false;
			}
		}
	}


	public function Sliders()
	{
		$Sliders = mysqli_query($this->dbCon, "SELECT * FROM noh_slides");
		return $Sliders;
	}
	public function Products()
	{
		$Products = mysqli_query($this->dbCon, "SELECT * FROM noh_products");
		return $Products;
	}
	public  function ProductInfo($product)
	{
		$ProductInfo = mysqli_query($this->dbCon, "SELECT * FROM noh_products WHERE id='$product'");
		$ProductInfo = mysqli_fetch_object($ProductInfo);
		return $ProductInfo;
	}

	public  function setProductInfo($product, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE noh_products SET `$name`='$value' WHERE id='$product'");
		return $this->countAffected();
	}

	public  function SliderInfo($slide)
	{
		$SliderInfo = mysqli_query($this->dbCon, "SELECT * FROM noh_slides WHERE id='$slide'");
		$SliderInfo = mysqli_fetch_object($SliderInfo);
		return $SliderInfo;
	}

	public  function setSliderInfo($slide, $name, $value)
	{
		mysqli_query($this->dbCon, "UPDATE noh_slides SET `$name`='$value' WHERE id='$slide'");
		return $this->countAffected();
	}
}
