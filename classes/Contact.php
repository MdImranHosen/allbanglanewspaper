<?php

/**
* Contact Class for Contact page 
*/
class Contact{

	private $db;
	private $fm;
	
  public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
  /* ajax with php data inserted system */

  public function getMessageFromUser($name,$email,$phone,$subject,$message){

  	if (empty($name) || empty($email) || empty($phone) || empty($subject)) {
       echo '<div class="alert alert-danger" role="alert">
                Field Must Not be Empty!
                 </div>';
              exit();
  	  }else{
  		$name    = $this->fm->validation($name);
	    $email   = $this->fm->validation($email);
      $phone   = $this->fm->validation($phone);
	    $subject = $this->fm->validation($subject);
	    $message = $this->fm->validation($message);

	    $name    = mysqli_real_escape_string($this->db->link, $name);
	    $email   = mysqli_real_escape_string($this->db->link, $email);
      $phone   = mysqli_real_escape_string($this->db->link, $phone);
	    $subject = mysqli_real_escape_string($this->db->link, $subject);
	    $message = mysqli_real_escape_string($this->db->link, $message);

	    $email   = filter_var($email, FILTER_SANITIZE_EMAIL);

     if (!filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
     	echo '<div class="alert alert-danger" role="alert">
                Invalied Email!
                 </div>';
              exit();
     }else{
     	$email = strtolower($email);
     	$sql = "INSERT INTO user_message(user_name,user_email,user_phone,user_subject,user_message) VALUES('$name','$email','$phone','$subject','$message')";
     	$result = $this->db->insert($sql);
     	if ($result) {
        $messageto = "Thank You for Messaging!";
        mail($email, "All Bangla Newspaper", $messageto, "imranhossen5912@gmail.com");

     		echo '<div class="alert alert-success" role="alert">
             Thank you for Messaging. Cheeck your Email!
     		</div>';
     		exit();
     	}else{
     		echo '<div class="alert alert-danger" role="alert">
             Data Not Inserted!
     		</div>';
     		exit();
     	}
     }
  		
  	}
    
  }


  /*ajax with php data inserted system end */

  public function getContactUserMessageList(){
    $sql = "SELECT * FROM user_message ORDER BY user_id DESC";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getUserMessageDelete($id){
    $sql = "DELETE FROM user_message WHERE user_id = '$id'";
    $result = $this->db->delete($sql);
    if ($result) {
      $msg = '<div class="alert alert-success" role="alert">
              Message Deleted Successfully!
            </div>';
       return $msg;
    }else{
      $msg = '<div class="alert alert-danger" role="alert">
              Message Not Deleted!
            </div>';
       return $msg;
    }
  }

  public function getUserMessageViewId($id){
    $sql = "SELECT * FROM user_message WHERE user_id = '$id'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getMessageSendid($data){

    $to      = $this->fm->validation($data['emailto']);
    $from    = $this->fm->validation($data['emailfrom']);
    $subject = $this->fm->validation($data['subject']);
    $message = $this->fm->validation($data['user_message']);
    $m_date  = $this->fm->validation($data['m_date']);

    $to      = mysqli_real_escape_string($this->db->link, $to);
    $from    = mysqli_real_escape_string($this->db->link, $from);
    $subject = mysqli_real_escape_string($this->db->link, $subject);
    $message = mysqli_real_escape_string($this->db->link, $message);
    $m_date  = mysqli_real_escape_string($this->db->link, $m_date); 

    $to         = filter_var($to, FILTER_SANITIZE_EMAIL);
    $from       = filter_var($from, FILTER_SANITIZE_EMAIL);

    if (empty($to) || empty($from) || empty($subject) || empty($message)) {
      $msg = '<div class="alert alert-danger" role="alert">
              Field Must Not be Empty!
            </div>';
       return $msg;
    }elseif(!filter_var($to, FILTER_VALIDATE_EMAIL)){
     $msg = '<div class="alert alert-danger" role="alert">
              To is Invalied Email !
            </div>';
       return $msg;
    }elseif(strlen($to) > 50){
      $msg = '<div class="alert alert-danger" role="alert">
              Email Address Should be less than 45 Characters!
            </div>';
       return $msg;
    }elseif(strlen($from) > 50){
      $msg = '<div class="alert alert-danger" role="alert">
              Email Address Should be less than 45 Characters!
            </div>';
       return $msg;
    }elseif(!filter_var($from, FILTER_VALIDATE_EMAIL)){
      $msg = '<div class="alert alert-danger" role="alert">
              From is Invalied Email !
            </div>';
       return $msg;
    }elseif(strlen($message) > 245){
      $msg = '<div class="alert alert-danger" role="alert">
              Email Address Should be less than 45 Characters!
            </div>';
       return $msg;
    }else{
     $sql = "INSERT INTO send_message(to_mail,from_mail,mail_subject,mail_message,mail_date) VALUES('$to','$from','$subject','$message','$m_date')";
     $result = $this->db->insert($sql);
     if ($result) {
           
     $sendmail = mail($to, $subject, $message, $from);
    if ($sendmail) {
      $msg = '<div class="alert alert-success" role="alert">
              Message Send Successfully!
            </div>';
       return $msg;
    }else{
     $msg = '<div class="alert alert-danger" role="alert">
              Message Dose Not Send!
            </div>';
       return $msg;
    }
    }else{
      $msg = '<div class="alert alert-danger" role="alert">
             Something Wrong!
            </div>';
       return $msg;
    }
    }
  }

  public function deleteUserMessage($id){
    $sql = "DELETE FROM user_message WHERE user_id in($id)";
    $result = $this->db->delete($sql);
    if ($result) {
      $msg = '<div class="alert alert-success" role="alert">
              User Message Delete Successfully!
            </div>';
       return $msg;
    }else{
     $msg = '<div class="alert alert-danger" role="alert">
              User Message Not Deleted!
            </div>';
       return $msg;
    }
  }
   /* User Message Inbox Number Show */
  public function getInboxMessageSer(){
    $sql = "SELECT * FROM user_message WHERE status = '0' ORDER BY user_id DESC";
    $result = $this->db->select($sql);
    return $result;
  }
  /* User Message Seen ok */
  public function getUserMessageViewokId($id){
    $sql = "UPDATE user_message SET status = '1' WHERE user_id = '$id'";
    $result = $this->db->update($sql);
    return $result;
  }

}