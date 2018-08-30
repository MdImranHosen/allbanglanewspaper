<?php
/**
 * Site_etc class use for Site footer copyright text developer text and site name and brower icon manage..
 */
class Site_etc{
	
	protected $db;
	protected $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function getSiteEtcByIdShow(){
		$sql = "SELECT * FROM site_etc ORDER BY ste_id LIMIT 1";
		$result = $this->db->select($sql);
		return $result;
	}
	
	public function getSiteEtc($data, $file){
		if (empty($data['site_name']) || empty($data['copyright_text']) || empty($data['developer_name'])) {
		  $msg = '<div class="alert alert-danger">Field must not be Empty!</div>';
		  return $msg;
		}elseif(strlen($data['site_name']) > 100){
           $msg = '<div class="alert alert-danger">Website name Should be Less than 100 Characters.</div>';
           return $msg;
		 }elseif(str_word_count($data['site_name']) > 4){
           $msg = '<div class="alert alert-danger">Website Name Allow Only 4 word.</div>';
           return $msg;
		 }elseif(strlen($data['copyright_text']) > 100){
           $msg = '<div class="alert alert-danger">Copyright Text Should be Less than 100 Characters.</div>';
           return $msg;
		 }elseif(strlen($data['developer_name']) > 50){
           $msg = '<div class="alert alert-danger">Developer Name Should be Less than 50 Characters.</div>';
           return $msg;
		 }elseif(!filter_var($data['copyright_surl'], FILTER_VALIDATE_URL) !== false){
           $msg = '<div class="alert alert-danger">Copyright Invalied URL.</div>';
           return $msg;
		 }elseif(strlen($data['copyright_surl']) > 250){
           $msg = '<div class="alert alert-danger">Copyright Site url Should be Less than 250 Characters.</div>';
           return $msg;
		 }elseif(!filter_var($data['developer_surl'], FILTER_VALIDATE_URL) !== false){
           $msg = '<div class="alert alert-danger">Developer site Invalied URL.</div>';
           return $msg;
		 }elseif(strlen($data['developer_surl']) > 250){
           $msg = '<div class="alert alert-danger">Developer Site url Should be Less than 250 Characters.</div>';
           return $msg;
		 }else{
			$ste_id          = $this->fm->validation($data['ste_id']);
			$site_name       = $this->fm->validation($data['site_name']);
			$copyright_text  = $this->fm->validation($data['copyright_text']);
			$copyright_surl  = $this->fm->validation($data['copyright_surl']);
			$developer_name  = $this->fm->validation($data['developer_name']);
			$developer_surl  = $this->fm->validation($data['developer_surl']);

			$ste_id          = mysqli_real_escape_string($this->db->link,$ste_id);
			$site_name       = mysqli_real_escape_string($this->db->link,$site_name);
			$copyright_text  = mysqli_real_escape_string($this->db->link,$copyright_text);
			$copyright_surl  = mysqli_real_escape_string($this->db->link,$copyright_surl);
			$developer_name  = mysqli_real_escape_string($this->db->link,$developer_name);
			$developer_surl  = mysqli_real_escape_string($this->db->link,$developer_surl);

			$parmit          = array('png','gif');
			$file_name       = $file['browser_icon']['name'];
			$file_size       = $file['browser_icon']['size'];
			$file_tmp        = $file['browser_icon']['tmp_name'];

			$div             = explode('.', $file_name);
			$file_ext        = strtolower(end($div));
			$file_unique     = 'icon.'.$file_ext;
			$upload_file     = "images/icon/".$file_unique;


			if (!empty($file_name)) {
			 $file_name   = mysqli_real_escape_string($this->db->link,$file_name);
			 if ($file_size > 51200) {
			 	$msg = '<div class="alert alert-danger"> Icon size should be less than 50 Kibibit.</div>';
			 	return $msg;
			 }elseif(in_array($file_ext, $parmit) === false){
                $msg = '<div class="alert alert-danger"> You can Upload Only: '.implode(', ', $parmit).'</div>';
                return $msg;
			 }else{
			 	$sqlCheck = "SELECT * FROM site_etc WHERE site_name = '$site_name' && browser_icon = '$upload_file' && copyright_text = '$copyright_text' && copyright_surl = '$copyright_surl' && developer_name = '$developer_name' && developer_surl = '$developer_surl' && ste_id = '$ste_id'";
			 	$checkResult = $this->db->select($sqlCheck);
			 	if ($checkResult !=false) {
			 	  $msg = '<div class="alert alert-danger">Data Not Change.</div>';
			 	  return $msg;
			 	}else{
                   $sqlimg = "SELECT * FROM site_etc WHERE ste_id = '$ste_id'";
                   $iconResult = $this->db->select($sqlimg);
                   if ($iconResult) {
                   	while ($iResult = $iconResult->fetch_assoc()) {
                   		   $iconImg = $iResult['browser_icon'];
                   		   $iconLin = '../'.$iconImg;
                   		   if ($iResult['browser_icon'] != NULL) {
                   		   	if (!file_exists($iconLin)) {
                   		   		
                   		   	}else{
                   		   		unlink($iconLin);
                   		   	}
                   		   }
                   	}
                   }
                  $movieFile = '../'.$upload_file;
                  move_uploaded_file($file_tmp, $movieFile);
                  $updateSql = "UPDATE site_etc SET 
                                site_name      = '$site_name',
                                browser_icon   = '$upload_file',
                                copyright_text = '$copyright_text',
                                copyright_surl = '$copyright_surl',
                                developer_name = '$developer_name',
                                developer_surl = '$developer_surl'
                                WHERE ste_id   = '$ste_id'";
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
			}else{
			 
			 	$sqlCheck = "SELECT * FROM site_etc WHERE site_name = '$site_name' && copyright_text = '$copyright_text' && copyright_surl = '$copyright_surl' && developer_name = '$developer_name' && developer_surl = '$developer_surl' && ste_id = '$ste_id'";
			 	$checkResult = $this->db->select($sqlCheck);
			 	if ($checkResult !=false) {
			 	  $msg = '<div class="alert alert-danger">Data Not Change.</div>';
			 	  return $msg;
			 	}else{
                  
                  $updateSql = "UPDATE site_etc SET
                                site_name      = '$site_name',
                                copyright_text = '$copyright_text',
                                copyright_surl = '$copyright_surl',
                                developer_name = '$developer_name',
                                developer_surl = '$developer_surl'
                                WHERE ste_id   = '$ste_id'";
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
include "Visitor.php";