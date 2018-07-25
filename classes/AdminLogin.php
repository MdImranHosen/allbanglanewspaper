<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();
?>
<?php
/**
* AdminLogin Class
*/
class AdminLogin{

	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function admin_loginchak($admin_email, $admin_pass, $captcha_code){
        $admin_email = $this->fm->validation($admin_email);
        $admin_pass  = $this->fm->validation($admin_pass);

        $admin_email = mysqli_real_escape_string($this->db->link, $admin_email);
        $admin_pass  = mysqli_real_escape_string($this->db->link, $admin_pass);
        $admin_email = filter_var($admin_email, FILTER_SANITIZE_EMAIL);

        if (empty($admin_email) || empty($admin_pass)) {
        	$msg = '<div class="alert alert-warning" role="alert">
                  Field Must not be Empty!
                 </div>';
        	return $msg;

        }elseif(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){ 
        $msg = '<div class="alert alert-danger" role="alert">
                  The Validation code does not match!
                 </div>';
                 return $msg;
       } elseif (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
        	$msg = '<div class="alert alert-danger" role="alert">
                  Invalid Email.
                 </div>';
                 return $msg;
        }else{
           $query = "SELECT * FROM tbl_admin WHERE email = '$admin_email' AND password = '$admin_pass'";
           $result = $this->db->select($query);
           if ($result != false) {
           	  $value = $result->fetch_assoc();
           	  Session::set("login", true);
           	  Session::set("id", $value['id']);
              Session::set("name", $value['name']);
           	  Session::set("admin_email", $value['email']);
              Session::set("level", $value['level']);

           	  header("Location:index.php");
           }else{
           	 $msg = '<div class="alert alert-info" role="alert">
                  Wrong Information Included!
                 </div>';
        	return $msg;
           }
        }
	}

 
}