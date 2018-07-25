<?php
/**
* User Registration Class
*/
class Registration{
  #properties....
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
    #methods of Admin Registration ...
	 public function adminRegistration($data){
          $name      = $data['name'];
          $email     = $data['email'];
          $password  = $data['password'];
          $cpassword = $data['cpassword'];
          $level     = $data['level'];
          
          $name      = $this->fm->validation($name);
          $email     = $this->fm->validation($email);
          $password  = $this->fm->validation($password);
          $cpassword = $this->fm->validation($cpassword);
          $level     = $this->fm->validation($level);
          
          $name      = mysqli_real_escape_string($this->db->link, $name);
          $email     = mysqli_real_escape_string($this->db->link, $email);
          $password  = mysqli_real_escape_string($this->db->link, $password);
          $cpassword = mysqli_real_escape_string($this->db->link, $cpassword);
          $level     = mysqli_real_escape_string($this->db->link, $level);
          $email     = filter_var($email, FILTER_SANITIZE_EMAIL);

     if (empty($name) || empty($email) || empty($password) || empty($cpassword)) {
          	 $msg = '<div class="alert alert-warning" role="alert">
                  Field must not be Empty!
                 </div>';
              return $msg;
          }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             $msg = '<div class="alert alert-danger" role="alert">
                  Invalidat Email!
                 </div>';
              return $msg;
          }elseif(strlen($password)>22 || strlen($password)<6){
            $msg = '<div class="alert alert-danger" role="alert">
                 Password must be between 6 and 22 characters!
                 </div>';
              return $msg;
          }elseif($password !== $cpassword){
            $msg = '<div class="alert alert-danger" role="alert">
                  Password and Confrom Password Not Match!
                 </div>';
              return $msg;
          }else{
               
               $mailquery = "SELECT * FROM tbl_admin WHERE email = '$email' LIMIT 1";
               $mailcheck = $this->db->select($mailquery);
             if ($mailcheck !=false) {
	              $msg = '<div class="alert alert-danger" role="alert">
                  This Email Already Exist!
                 </div>';
                 return $msg; 
               }else{

           	 	$password = md5($password);
               
                $sql = "INSERT INTO tbl_admin(name,email,password,level) VALUES('$name','$email','$password','$level')";
               $query = $this->db->insert($sql);
               if ($query) {
               	$msg = '<div class="alert alert-success" role="alert">
                  Registration Successfuly!
                 </div>';
                 return $msg;
                 }
               	
               }


          }
   }
    #methods of Admin Sesect option....
   public function getAdminData(){
   	$sql = "SELECT * FROM tbl_admin";
   	$result = $this->db->select($sql);
   	return $result;
   }
    #methods of Admin Delete option....
   public function getAdminDelete($id){
   	$sql = "DELETE FROM tbl_admin WHERE id = '$id'";
   	$result = $this->db->delete($sql);
   	if ($result) {
   		$msg = '<div class="alert alert-success" role="alert">
                  Data Deleted Successfuly!
                 </div>';
        return $msg;
   	}else{
   		$msg = '<div class="alert alert-danger" role="alert">
                  Data Not Deleted!
                 </div>';
        return $msg;
   	}
   	
   }
   #methods of Admin List Edit show option....
	public function getAdminTableBayId($id){
    $sql = "SELECT * FROM tbl_admin WHERE id = '$id'";
    $result = $this->db->select($sql);
    return $result;
  }
   #methods of Admin Update option....
  public function updateAdminId($data, $id){
       $name  = $data['name'];
       $email = $data['email'];
       $level = $data['level'];

       $name  = $this->fm->validation($name);
       $email = $this->fm->validation($email);
       $level = $this->fm->validation($level);

       $name  = mysqli_real_escape_string($this->db->link, $name);
       $email = mysqli_real_escape_string($this->db->link, $email);
       $level = mysqli_real_escape_string($this->db->link, $level);
       $email = filter_var($email, FILTER_SANITIZE_EMAIL);

       if ($name == '' || $email == '' || $level == '') {
         $msg = '<div class="alert alert-danger" role="alert">
                  Field must not be empty!
                 </div>';
         return $msg;
       }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $msg = '<div class="alert alert-danger" role="alert">
                  Field must not be empty!
                 </div>';
       }else{
            
              $updateq = "UPDATE tbl_admin 
                        SET 
                    name  = '$name',
                    email = '$email',
                    level = '$level'
                    WHERE id = '$id'";
              $updateResult = $this->db->update($updateq);
              if ($updateResult) {
                $msg = '<div class="alert alert-success" role="alert">
                  Data Update Successfuly!
                <div>';
                return $msg;
              }
            
       }
  }
	
}



