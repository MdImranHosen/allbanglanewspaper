<?php
include 'lib/Database.php';
#include 'lib/Session.php';
include 'helpers/Format.php';
/**
* User_register
*/
class User_register{

	private $db;
	private $fm;

	
	public function __construct(){
        
        $this->db = new Database();
        $this->fm = new Format(); 
	}

	public function getRegistionInsert($data, $file, $ipadd){
	  if (empty($data['user_name'])) {
	  	$msg = '<div class="alert alert-warning" role="alert">
                 Name Field must not be Empty!
                 </div>';
              return $msg;
	  }elseif(empty($data['user_email'])){
	  	$msg = '<div class="alert alert-warning" role="alert">
                 Email Field must not be Empty!
                 </div>';
              return $msg;
	  }elseif(empty($data['user_password'])){
	  	$msg = '<div class="alert alert-warning" role="alert">
                 Password Field must not be Empty!
                 </div>';
              return $msg;
	  }elseif(empty($data['c_password'])){
	  	$msg = '<div class="alert alert-warning" role="alert">
                 Confram Password Field must not be Empty!
                 </div>';
              return $msg;
	  }elseif(empty($data['user_agree'])){
	  	$msg = '<div class="alert alert-warning" role="alert">
                 Confram Password Field must not be Empty!
                 </div>';
              return $msg;
	  }else{
       $user_name     = $this->fm->validation($data['user_name']);
       $user_email    = $this->fm->validation($data['user_email']);
       $user_password = $this->fm->validation($data['user_password']);
       $c_password    = $this->fm->validation($data['c_password']);
       $user_agree    = $this->fm->validation($data['user_agree']);

       $user_name     = mysqli_real_escape_string($this->db->link, $user_name);
       $user_email    = mysqli_real_escape_string($this->db->link, $user_email);
       $user_password = mysqli_real_escape_string($this->db->link, $user_password);
       $c_password    = mysqli_real_escape_string($this->db->link, $c_password);
       $user_agree    = mysqli_real_escape_string($this->db->link, $user_agree);
       $user_email    = filter_var($user_email, FILTER_SANITIZE_EMAIL);

       $parmit        = array('png','jpg','gif','jpeg');
       $file_name     = $file['user_image']['name'];
       $file_size     = $file['user_image']['size'];
       $file_temp     = $file['user_image']['tmp_name'];

       $div           = explode('.', $file_name);
       $file_ext      = strtolower(end($div));
       $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
       $upload_file   = "userimage/".$unique_file;

       
       if (!preg_match("/^[a-zA-Z ]*$/",$user_name)) {
       $msg = '<div class="alert alert-danger" role="alert">
                 Only letters and white space allowed!
                 </div>';
              return $msg;
       }elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL) !== false) {
       	$msg = '<div class="alert alert-danger" role="alert">
                 Invalid Email Address!
                 </div>';
              return $msg;
       }elseif(empty($file_name)){
          $msg = '<div class="alert alert-danger" role="alert">
                 Image input Field must not be Empty!
                 </div>';
              return $msg;
       }elseif($file_size > 2097152){
          $msg = '<div class="alert alert-danger" role="alert">
                 Image size must be maximum 2MB!
                 </div>';
              return $msg;
       }elseif(in_array($file_ext, $parmit) === false){
         $msg = '<div class="alert alert-danger" role="alert">
                 You can Upload only:-'.implode(', ', $parmit).'
                 </div>';
              return $msg;
       }elseif($user_password !== $c_password){
         $msg = '<div class="alert alert-danger" role="alert">
                 Password and its Confirmation does not match!
                 </div>';
              return $msg;
       }elseif(strlen($user_password)>22 || strlen($user_password)<6){
          $msg = '<div class="alert alert-danger" role="alert">
                 Password must be between 6 and 22 characters!
                 </div>';
              return $msg;
       }else{
       	 $emailCheck = "SELECT * FROM user_comment WHERE email = '$user_email' LIMIT 1";
       	 $emailResult = $this->db->select($emailCheck);
       	 if ($emailResult != false) {
       	 	$msg = '<div class="alert alert-danger" role="alert">
                  This Email Already Exist!
                 </div>';
                 return $msg;
       	 }else{
       	 	move_uploaded_file($file_temp, $upload_file);
       	 	$user_password = md5($user_password);
       	 	$sql = "INSERT INTO user_comment(name, image, email, password, ip) VALUES('$user_name','$upload_file','$user_email','$user_password','$ipadd')";
       	 	$result = $this->db->insert($sql);
       	 	if ($result) {
       	 		$msg = '<div class="alert alert-success" role="alert">
                  Registion Successfully!
                 </div>';
                 return $msg;
       	 	}else{
       	 		$msg = '<div class="alert alert-warning" role="alert">
                  Does not Registration Successfully!
                 </div>';
                 return $msg;
       	 	}

       	 }

       }
      }
	 } 
}