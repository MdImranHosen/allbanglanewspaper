<?php
/**
* User_reg_co class
*/
class User_reg_co{
	private $db;
	private $fm;
  public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
  public function getUserListNewsPaper(){
  	$sql = "SELECT * FROM user_comment";
  	$result = $this->db->select($sql);
  	return $result;
  }

  public function getDeleteUserList($id){
  	$sql = "DELETE FROM user_comment WHERE id = '$id'";
  	$result = $this->db->delete($sql);
  	if ($result) {
  		$msg = '<div class="alert alert-success" role="alert">
                  User Id Deleted Successfully!
                 </div>';
           return $msg;
  	}else{
  		$msg = '<div class="alert alert-danger" role="alert">
                  User Id Not Deleted!
                 </div>';
           return $msg;
  	}
  }

  /* User Terms and conditions add Query Start */

  public function getTermsAndConditions(){
    $sql = "SELECT * FROM termsandconditions WHERE id LIMIT 1";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getTermsConditionsInsert($data){
      
      $id                       = $this->fm->validation($data['id']);
      $termsTitle               = $this->fm->validation($data['termsTitle']);
      $details_terms_conditions = $this->fm->validationText($data['details_terms_conditions']);
      
      $id                       = mysqli_real_escape_string($this->db->link, $id);
      $termsTitle               = mysqli_real_escape_string($this->db->link, $termsTitle);
      $details_terms_conditions = mysqli_real_escape_string($this->db->link, $details_terms_conditions);

      if (empty($termsTitle) || empty($details_terms_conditions)) {
        $msg = '<div class="alert alert-warning" role="alert">
                  Field Must not be Empty!
                 </div>';
           return $msg;
      }else{

      $sqlChack = "SELECT * FROM termsandconditions WHERE title = '$termsTitle' && details = '$details_terms_conditions'";
      $selectResult = $this->db->select($sqlChack);
      if ($selectResult != false) {
        $msg = '<div class="alert alert-warning" role="alert">
                  Data Not Changes!
                 </div>';
           return $msg;
      }else{

      $sql = "UPDATE termsandconditions 
                   SET 
                title  = '$termsTitle',
               details = '$details_terms_conditions'
               WHERE id = '$id';
                ";

      $result = $this->db->update($sql);
      if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
                  Terms Data Inserted Successfully!
                 </div>';
           return $msg;
      }else{
        $msg = '<div class="alert alert-danger" role="alert">
                  Data Not Inserted!
                 </div>';
           return $msg;
      }
     }
    }
  }
}