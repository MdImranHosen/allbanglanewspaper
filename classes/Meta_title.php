<?php
/**
 * Meta_title This class use Meta tage and title manages this website..
 */
class Meta_title{
   private $db;
   private $fm;
	
   public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
	}
   public function getCategoryNameById($paperId){
	 $sql = "SELECT * FROM bd_ns_cat WHERE catId = '$paperId'";
	 $result = $this->db->select($sql);
	 return $result;
	}
   public function getTvNameById($tvbyId){
   	$sql = "SELECT * FROM bd_tv WHERE tvId = '$tvbyId'";
   	$result = $this->db->select($sql);
   	return $result;
   }
   public function getRadioById($radioId){
   	$sql = "SELECT * FROM bd_radio WHERE id = '$radioId'";
   	$result = $this->db->select($sql);
   	return $result;
   }
}