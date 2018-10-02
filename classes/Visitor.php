<?php
/**
 * Visitor Counter ..
 */
class Visitor extends Site_etc{
	
	public function getVisitorCounter($ip){
		$ip = mysqli_real_escape_string($this->db->link, $ip);
		$checksql = "SELECT ip FROM visitors WHERE ip = '$ip'";
		$checkr   = $this->db->select($checksql);
		if (!$checkr) {
			$date = date("Y-m-d");
			$sql = "INSERT INTO visitors(ip,datet) VALUES('$ip','$date')";
			$result = $this->db->insert($sql);
			return $result;
		}
	}
	public function showVisitorNumber(){
		$sqlshow = "SELECT * FROM visitors";
		$showResult = $this->db->select($sqlshow);
		return $showResult;
	}
	public function todayVisitorNumber($date){
		$sqlshow = "SELECT * FROM visitors WHERE datet = '$date'";
		$showResult = $this->db->select($sqlshow);
		return $showResult;
	}
	public function getVisitorDetails($pageurl,$ip,$datetime){
		$pageurl  = mysqli_real_escape_string($this->db->link, $pageurl);
		$ip       = mysqli_real_escape_string($this->db->link, $ip);
		$datetime = mysqli_real_escape_string($this->db->link, $datetime);

		$checksqlip = "SELECT * FROM visitors WHERE ip = '$ip'";
		$chResult = $this->db->select($checksqlip);
		if ($chResult) {
			$cresult = $chResult->fetch_assoc();
			$id = $cresult['unique_vid'];
			$insertSql = "INSERT INTO visitors_details (id,pagename,date_time,views) VALUES('$id','$pageurl','$datetime','1')";
			$vdresult = $this->db->insert($insertSql);
			return $vdresult;
		}
	}
	public function totalPageView(){
		$pagevSql = "SELECT * FROM visitors_details";
		$pvResult = $this->db->select($pagevSql);
		return $pvResult;
	}
    // Visitor counter ..setting show..
	public function getVisiterIdSetting(){
	  $sql = "SELECT * FROM visitor_setting WHERE visitor_setting_Id = '1'";
	  $result = $this->db->select($sql);
	  return $result;
	 }

	 // Visitor counter ..update  ..
	public function visitorSettingUpdate($data){
	   $per_page = $data['record_per_page_show'];
	   $order_by = $data['order_by_result'];
	   $asc_desc = $data['asc_desc_order'];
	   $vist_id  = $data['visitor_setting_Id'];
	   if (empty($per_page) || empty($order_by) || empty($asc_desc) || empty($vist_id)) {
	    $msg = '<div class="alert alert-danger">Field Must not be Empty!</div>';
	    return $msg;
	   }else{
	    $per_page = $this->fm->validation($per_page);
	    $order_by = $this->fm->validation($order_by);
	    $asc_desc = $this->fm->validation($asc_desc);
	    $asc_desc = $this->fm->validation($asc_desc);

	    $per_page = mysqli_real_escape_string($this->db->link, $per_page);
	    $order_by = mysqli_real_escape_string($this->db->link, $order_by);
	    $asc_desc = mysqli_real_escape_string($this->db->link, $asc_desc);
	    $vist_id  = mysqli_real_escape_string($this->db->link, $vist_id);

	    $sql = "UPDATE visitor_setting SET
	                    record_per_page    = '$per_page',
	                    order_by           = '$order_by',
	                    asc_desc           = '$asc_desc'
	                  WHERE visitor_setting_Id = '$vist_id'";
	    $result = $this->db->update($sql);
	    if ($result) {
	      $msg = '<div class="alert alert-success">Update Successfully!</div>';
	      return $msg;
	    }else{
	      $msg = '<div class="alert alert-danger">Something went Wrong.</div>';
	      return $msg;
	    }
	   }
	 }
	 public function getPaginationVisitorsResult(){
	  $sql = "SELECT * FROM visitors ORDER BY unique_vid DESC";
	  $result = $this->db->select($sql);
	  return $result;
	 }
	 //visitor counter per page ...

	 public function getUniqueVisitorPerPage($start_from,$record_per_page){

	  $orSql = "SELECT * FROM visitor_setting WHERE visitor_setting_Id = '1'";
	  $orResult = $this->db->select($orSql);
	  if ($orResult) {
	    $orShow  = $orResult->fetch_assoc();
	    $orderId = $orShow['order_by'];
	    $ascDesc = $orShow['asc_desc'];
	  $sql = "SELECT * FROM visitors ORDER BY $orderId $ascDesc LIMIT $start_from, $record_per_page";
	  $result = $this->db->select($sql);
	  return $result;
	  }
	 }
  //Uniqe visitor counter Delete query..
  public function getVisitorDelete($visitorId){
 	$sql = "DELETE FROM visitors WHERE unique_vid = '$visitorId'";
 	$result = $this->db->delete($sql);
 	if ($result) {
 		 $sqlv = "DELETE FROM visitors_details WHERE id = '$visitorId'";
 	     $resultv = $this->db->delete($sqlv);
 	     return $resultv;
 	}else{
 		$msg = '<div class="alert alert-danger">Something went Wrong.</div>';
 		return $msg;
 	}
  }
  // Count Visitor page view...
  public function getVisitorIpbyPagevisit($pageviewnumber){
    $sql = "SELECT * FROM visitors_details WHERE id = '$pageviewnumber'";
    $result = $this->db->select($sql);
    return $result;
  }
  // Visitor counter by id total page view ..setting show..
	public function getVisiterByIdSetting(){
	  $sql = "SELECT * FROM visitor_setting WHERE visitor_setting_Id = '2'";
	  $result = $this->db->select($sql);
	  return $result;
	 }
  // Visitor counter page view setting ..update  ..
	public function visitorPageSettingUpdate($data){
	   $per_page = $data['record_per_page_show'];
	   $order_by = $data['order_by_result'];
	   $asc_desc = $data['asc_desc_order'];
	   $vist_id  = $data['visitor_setting_Id'];
	   if (empty($per_page) || empty($order_by) || empty($asc_desc) || empty($vist_id)) {
	    $msg = '<div class="alert alert-danger">Field Must not be Empty!</div>';
	    return $msg;
	   }else{
	    $per_page = $this->fm->validation($per_page);
	    $order_by = $this->fm->validation($order_by);
	    $asc_desc = $this->fm->validation($asc_desc);
	    $asc_desc = $this->fm->validation($asc_desc);

	    $per_page = mysqli_real_escape_string($this->db->link, $per_page);
	    $order_by = mysqli_real_escape_string($this->db->link, $order_by);
	    $asc_desc = mysqli_real_escape_string($this->db->link, $asc_desc);
	    $vist_id  = mysqli_real_escape_string($this->db->link, $vist_id);

	    $sql = "UPDATE visitor_setting SET
	                    record_per_page    = '$per_page',
	                    order_by           = '$order_by',
	                    asc_desc           = '$asc_desc'
	                  WHERE visitor_setting_Id = '$vist_id'";
	    $result = $this->db->update($sql);
	    if ($result) {
	      $msg = '<div class="alert alert-success">Update Successfully!</div>';
	      return $msg;
	    }else{
	      $msg = '<div class="alert alert-danger">Something went Wrong.</div>';
	      return $msg;
	    }
	   }
	 }
	 //visitor page view by id ....
	 public function getPaginationVisitorsById($pageViewId){
	  $sql = "SELECT * FROM visitors_details WHERE id = '$pageViewId' ORDER BY idvisitor DESC";
	  $result = $this->db->select($sql);
	  return $result;
	 }
	 // Visitor Ip By Id Show Visit page List..
	 public function getUniqueVisitorByIdPerPage($pageVId,$start_from,$record_per_page){

	  $orSql = "SELECT * FROM visitor_setting WHERE visitor_setting_Id = '2'";
	  $orResult = $this->db->select($orSql);
	  if ($orResult) {
	    $orShow  = $orResult->fetch_assoc();
	    $orderId = $orShow['order_by'];
	    $ascDesc = $orShow['asc_desc'];
	  $sql = "SELECT * FROM visitors_details WHERE id = '$pageVId' ORDER BY $orderId $ascDesc LIMIT $start_from, $record_per_page";
	  $result = $this->db->select($sql);
	  return $result;
	  }
	 }
	#visitor undate page view id ...
	public function updatePageViewId($pageVId){
		$pageVId = mysqli_real_escape_string($this->db->link, $pageVId);
		if (!empty($pageVId)) {
			$sql = "UPDATE visitor_setting SET
                          pageViewId = '$pageVId'
                        WHERE visitor_setting_Id = '2'";
            $result = $this->db->update($sql);
            return $result;
		}
		
	}
	// visitor ip address..show page view...page.
	public function getVisitorIpAddress($pagevisitorIp){
      $sql = "SELECT * FROM visitors WHERE unique_vid = '$pagevisitorIp'";
      $result = $this->db->select($sql);
      return $result;
	}
	// visitor visit page by id delete..
	public function getVisitorPageByIdDelete($pagebyId){
		$sql = "DELETE FROM visitors_details WHERE idvisitor = '$pagebyId'";
		$result = $this->db->delete($sql);
		return $result;
	}
	//visitor page view data check. By ip.
	public function checkDataPageview($uniqueId){
      $sql = "SELECT * FROM visitors_details WHERE id = '$uniqueId'";
      $result = $this->db->select($sql);
      return $result;
	}
	// check visitor page view empty or not...
	public function checkDataPageviewById($pagebyId){
		$sql = "SELECT * FROM visitors_details WHERE idvisitor = '$pagebyId'";
		$result = $this->db->select($sql);
		return $result;
	}
}