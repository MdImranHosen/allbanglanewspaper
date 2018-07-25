<?php
/**
 * About_address class use for Site Address & About manage..
 */
class About_address{
	
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function getSiteAboutAddressByIdShow(){
		$sql = "SELECT * FROM site_about_address ORDER BY ste_id LIMIT 1";
		$result = $this->db->select($sql);
		return $result;
	}
	public function siteAboutAddressContact($data){
		if (empty($data['site_address']) || empty($data['site_phone']) || empty($data['site_email']) || empty($data['website_url']) || empty($data['site_about'])) {
		  $msg = '<div class="alert alert-danger">Field must not be Empty!</div>';
		  return $msg;
		}else{
			$ste_id       = $this->fm->validation($data['ste_id']);
			$site_address = $this->fm->validation($data['site_address']);
			$site_phone   = $this->fm->validation($data['site_phone']);
			$site_email   = $this->fm->validation($data['site_email']);
			$website_url  = $this->fm->validation($data['website_url']);
			$site_about   = $this->fm->validationText($data['site_about']);

			$ste_id       = mysqli_real_escape_string($this->db->link,$ste_id);
			$site_address = mysqli_real_escape_string($this->db->link,$site_address);
			$site_phone   = mysqli_real_escape_string($this->db->link,$site_phone);
			$site_email   = mysqli_real_escape_string($this->db->link,$site_email);
			$website_url  = mysqli_real_escape_string($this->db->link,$website_url);
			$site_about   = mysqli_real_escape_string($this->db->link,$site_about);

		if(strlen($site_address) > 220){
           $msg = '<div class="alert alert-danger">Website Address Should be Less than 220 Characters.</div>';
           return $msg;
		 }elseif(strlen($site_phone) > 15){
           $msg = '<div class="alert alert-danger">Pnone Should be Less than 100 Characters.</div>';
           return $msg;
		 }elseif(strlen($site_email) > 50){
           $msg = '<div class="alert alert-danger">Email Address Should be Less than 50 Characters.</div>';
           return $msg;
		 }elseif(!filter_var($site_email, FILTER_VALIDATE_EMAIL) !== false){
           $msg = '<div class="alert alert-danger">Invalied Email Address.</div>';
           return $msg;
		 }elseif(strlen($website_url) > 250){
           $msg = '<div class="alert alert-danger">Webite url Should be Less than 250 Characters.</div>';
           return $msg;
		 }elseif(!filter_var($website_url, FILTER_VALIDATE_URL) !== false){
           $msg = '<div class="alert alert-danger">Website Invalied URL.</div>';
           return $msg;
		 }else{
			 
		 	$sqlCheck = "SELECT * FROM site_about_address WHERE s_ads = '$site_address' && s_phone = '$site_phone' && s_email = '$site_email' && ws_u = '$website_url' && s_about = '$site_about' && ste_id = '$ste_id'";
		 	$checkResult = $this->db->select($sqlCheck);
		 	if ($checkResult !=false) {
		 	  $msg = '<div class="alert alert-danger">Data Not Change.</div>';
		 	  return $msg;
		 	}else{
              
              $updateSql = "UPDATE site_about_address SET
                            s_ads   = '$site_address',
                            s_phone = '$site_phone',
                            s_email = '$site_email',
                            ws_u    = '$website_url',
                            s_about = '$site_about'
                            WHERE ste_id = '$ste_id'";
              $updateResult = $this->db->update($updateSql);
              if ($updateResult) {
              	$msg = '<div class="alert alert-success">Data Update Successfully!</div>';
              	return $msg;
              }else{
              	$msg = '<div class="alert alert-danger">Something Wrong.</div>';
              	return $msg;
              }
		 	}
			 
		 }
		}

	}
}