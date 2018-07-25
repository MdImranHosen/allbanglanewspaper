<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../helpers/Format.php');
Session::userLogin();
?>
<?php
/**
* User_login Class
*/
class User_login{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function getUserLoginId($data){
       $captcha_code = $_POST['captcha_code'];
       $user_email    = $this->fm->validation($data['user_email']);
       $user_password = $this->fm->validation($data['user_password']);
       #$captcha_code  = $this->fm->validation($data['captcha_code']);

       $user_email    = mysqli_real_escape_string($this->db->link, $user_email);
       $user_password = mysqli_real_escape_string($this->db->link, $user_password);
       #$captcha_code  = mysqli_real_escape_string($this->db->link, $captcha_code);

       $user_email    = filter_var($user_email, FILTER_SANITIZE_EMAIL);

       if (empty($user_email) || empty($user_password)) {
       	$msg = '<div class="alert alert-warning" role="alert">
                  Field Must not be Empty!
                 </div>';
        	return $msg;
       }elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
         $msg = '<div class="alert alert-warning" role="alert">
                  Invalid Email Address!
                 </div>';
        	return $msg;
       }elseif(strlen($user_password)>22 && strlen($user_password)<6){
         $msg = '<div class="alert alert-danger" role="alert">
                 Password must be between 6 and 22 characters!
                 </div>';
              return $msg;
       }/*elseif(empty($_SESSION['captcha_code'])){
          $msg = '<div class="alert alert-danger" role="alert">
                 Captchar Field Must not be Empty!
                 </div>';
              return $msg;
       }elseif(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
         $msg = '<div class="alert alert-danger" role="alert">
                  The Validation code does not match!
                 </div>';
                 return $msg;
       }*/else{
       	 $user_password = md5($user_password);
         $sql = "SELECT * FROM user_comment WHERE email = '$user_email' && password = '$user_password'";
         $result = $this->db->select($sql);
         if ($result != false) {
         	$value = $result->fetch_assoc();
         	Session::set("user_login", true);
         	Session::set("id", $value['id']);
         	Session::set("name", $value['name']);
         	Session::set("user_email", $value['email']);

         	header("Location.index.php");
         }else{
         	$msg = '<div class="alert alert-info" role="alert">
                  Wrong Information Included!
                 </div>';
        	return $msg;
         }
       }
	}
}