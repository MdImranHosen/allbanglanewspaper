<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
/**
* Populer_newsPaper
*/
class Populer_newsPaper{
	private $db;
	
 public function __construct(){
		$this->db = new Database();
	}

  public function getPopulerNewsPaper(){
 	$sql = "SELECT * FROM populer_bangla_news";
 	$result = $this->db->select($sql);
 	return $result;
 }

}