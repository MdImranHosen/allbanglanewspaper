<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
/**
* Show_news Class....
*/
class Show_news{
    private $db;
    private $fm;
	
    public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function getCategoryFistResult(){
		$sql = "SELECT * FROM category WHERE catId ORDER BY catId ASC LIMIT 1";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getCategorySecondResult(){
		$secondSql = "SELECT * FROM category WHERE catId ORDER BY catId ASC LIMIT 1,1";
		$result = $this->db->select($secondSql);
		return $result;
	}

	public function getCategoryThirdResult(){
		$thirdSql = "SELECT * FROM category WHERE catId ORDER BY catId ASC LIMIT 2,1";
		$result = $this->db->select($thirdSql);
		return $result;
	}
	public function getCategoryFourResult(){
		$fourSql = "SELECT * FROM category WHERE catId ORDER BY catId ASC LIMIT 3,1";
		$result = $this->db->select($fourSql);
		return $result;
	}

	public function getCategoryFiveResult(){
		$fiveSql = "SELECT * FROM category WHERE catId ORDER BY catId ASC LIMIT 4,1";
		$result = $this->db->select($fiveSql);
		return $result;
	}

	public function getCategorySixResult(){
		$sixSql = "SELECT * FROM category WHERE catId ORDER BY catId ASC LIMIT 5,1";
		$result = $this->db->select($sixSql);
		return $result;
	}

	public function getCategorySevenResult(){
		$sevenSql = "SELECT * FROM category WHERE catId ORDER BY catId ASC LIMIT 6,1";
		$result = $this->db->select($sevenSql);
		return $result;
	}

	public function getFirstNewsResult($firstcatId){
		$firstSql = "SELECT * FROM tbl_news_post WHERE catId = '$firstcatId' ORDER BY id DESC LIMIT 1";
		$result = $this->db->select($firstSql);
		return $result;
	}

	public function getFirstNewsallResult($firstcatId){
		$firstallSql = "SELECT * FROM tbl_news_post WHERE catId = '$firstcatId' ORDER BY id DESC LIMIT 1,4";
		$result = $this->db->select($firstallSql);
		return $result;
	}

	public function getSecondNewsResult($secondId){
		$firstSql = "SELECT * FROM tbl_news_post WHERE catId = '$secondId' ORDER BY id DESC LIMIT 1";
		$result = $this->db->select($firstSql);
		return $result;
	}

	public function getSecondNewsallResult($secondId){
		$thirallSql = "SELECT * FROM tbl_news_post WHERE catId = '$secondId' ORDER BY id DESC LIMIT 1,4";
		$result = $this->db->select($thirallSql);
		return $result;
	}

	public function getThirdNewsResult($thirdId){
		$firstSql = "SELECT * FROM tbl_news_post WHERE catId = '$thirdId' ORDER BY id DESC LIMIT 1";
		$result = $this->db->select($firstSql);
		return $result;
	}

	public function getThirdNewsallResult($thirdId){
		$thirallSql = "SELECT * FROM tbl_news_post WHERE catId = '$thirdId' ORDER BY id DESC LIMIT 1,4";
		$result = $this->db->select($thirallSql);
		return $result;
	}

	public function getFourNewsResult($fourId){
		$firstSql = "SELECT * FROM tbl_news_post WHERE catId = '$fourId' ORDER BY id DESC LIMIT 1";
		$result = $this->db->select($firstSql);
		return $result;
	}

	public function getFourNewsallResult($fourId){
		$fourSql = "SELECT * FROM tbl_news_post WHERE catId = '$fourId' ORDER BY id DESC LIMIT 1,4";
		$result = $this->db->select($fourSql);
		return $result;
	}

	public function getFiveNewsallResult($fiveId){
		$fiveSql = "SELECT * FROM tbl_news_post WHERE catId = '$fiveId' ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($fiveSql);
		return $result;
	}

	public function getSixNewsallResult($sixId){
		$sixSql = "SELECT * FROM tbl_news_post WHERE catId = '$sixId' ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($sixSql);
		return $result;
	}

	public function getSevenNewsallResult($sevenId){
		$sevenSql = "SELECT * FROM tbl_news_post WHERE catId = '$sevenId' ORDER BY id DESC LIMIT 4";
		$result = $this->db->select($sevenSql);
		return $result;
	}

	public function getMqNewsList(){
		$sql = "SELECT * FROM tbl_news_post WHERE optradio = '2' ORDER BY id DESC LIMIT 6";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getNewsUniqucId($id){
		$sql = "SELECT * FROM tbl_news_post WHERE id = '$id'";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getFirstNewsResultDetails($firstcatId){
		$sql = "SELECT * FROM tbl_news_post WHERE catId = '$firstcatId' ORDER BY id DESC LIMIT 10";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getCategoryFistResultDetails($firstcatId){
		$sql = "SELECT * FROM category WHERE catId = '$firstcatId'";
		$result = $this->db->select($sql);
		return $result;
	}

	 /* Terms and Conditions query */
   public function getTremsAndCondations(){
    $sql = "SELECT * FROM termsandconditions WHERE id LIMIT 1";
    $result = $this->db->select($sql);
    return $result;
  }
}