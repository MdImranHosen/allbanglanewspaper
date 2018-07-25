<?php
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../config/config.php');
 ?>
<?php
/**
* Database class 
*/
class Database{
   public $host   = DB_HOST;
   public $user   = DB_USER;
   public $pass   = DB_PASS;
   public $dbname = DB_NAME;

	public $link;
	public $error;

	function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if (!$this->link) {
			$this->error = "Connection Fail".$this->link->connect_error;
			return false;
		}
	}
	// Read and Select query
	public function select($query){
      $result = $this->link->query($query) or die($this->link->error.__LINE__);
      if ($result->num_rows > 0) {
      	return $result;
      }else{
      	return false;
      }
	}
	// Insert query
	public function insert($query){
     $result = $this->link->query($query) or die($this->link->error.__LINE__);
     if ($result) {
     	return $result;
     }else{
     	return false;
     }
	}

	//Update query
	public function update($query){
      $result_update = $this->link->query($query) or die($this->link->error.__LINE__);
      if ($result_update) {
      	return $result_update;
      }else{
      	return false;
      }
	}

	//Delete Query

	public function delete($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}
}