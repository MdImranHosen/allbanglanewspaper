<?php
/**
 * This Class user of Community Manage...
 */
class Community{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function getCommunityData(){
		$sql = "SELECT * FROM bd_community ORDER BY comyId DESC";
		$result = $this->db->select($sql);
		return $result;
	}
	public function communityAdd($data){
      $name     = $data['community_name'];
      $location = $data['community_location'];
      $url      = $data['community_url'];
      $fburl    = $data['community_fburl'];
      $popular  = $data['community_popular'];
      $level    = $data['community_level'];
      if (empty($name) || empty($location) || empty($popular) || empty($level)) {
      	$msg = '<div class="alert alert-danger">Field Must Not Be Empty!</div>';
      	return $msg;
      }else{

      $name     = $this->fm->validation($name);
      $location = $this->fm->validation($location);
      $url      = $this->fm->validation($url);
      $fburl    = $this->fm->validation($fburl);
      $popular  = $this->fm->validation($popular);
      $level    = $this->fm->validation($level);

      $name     = mysqli_real_escape_string($this->db->link, $name);
      $location = mysqli_real_escape_string($this->db->link, $location);
      $url      = mysqli_real_escape_string($this->db->link, $url);
      $fburl    = mysqli_real_escape_string($this->db->link, $fburl);
      $popular  = mysqli_real_escape_string($this->db->link, $popular);
      $level    = mysqli_real_escape_string($this->db->link, $level);
      

      if (!empty($url)) {
        $url    = filter_var($url, FILTER_SANITIZE_URL);

        if(strlen($url) > 100){
         $msg = '<div class="alert alert-danger">Community URL Should be Lessthan 100 Characters</div>';
         return $msg;
        }elseif(!filter_var($url, FILTER_VALIDATE_URL)){
         $msg = '<div class="alert alert-danger">Community Website Invalidate URL.</div>';
         return $msg;
        }
      }

      if (!empty($fburl)) {
        $fburl   = filter_var($fburl, FILTER_SANITIZE_URL);
       if(strlen($fburl) > 100){
         $msg = '<div class="alert alert-danger">Facebook URL Should be Lessthan 100 Characters</div>';
         return $msg;
        }elseif(!filter_var($fburl, FILTER_VALIDATE_URL)){
         $msg = '<div class="alert alert-danger">Facebook Invalide URL.</div>';
         return $msg;
        }
      }

      if (strlen($name) > 120) {
      	 $msg = '<div class="alert alert-danger">Community Name Should be Lessthan 120 Characters</div>';
      	 return $msg;
      	}elseif(strlen($location) > 50){
         $msg = '<div class="alert alert-danger">Community Location Should be Lessthan 50 Characters</div>';
      	 return $msg;
      	}elseif(strlen($popular) > 10){
          $msg = '<div class="alert alert-danger">Community Popular Or General Should be Less than 10 Characters</div>';
       }elseif(!filter_var($popular, FILTER_VALIDATE_INT)){
          $msg = '<div class="alert alert-danger">Community Invalide Integer.</div>';
          return $msg;
       }elseif(strlen($level) > 10){
          $msg = '<div class="alert alert-danger">Community Richest Or Other Country Should be Less than 10 Characters</div>';
       }elseif(!filter_var($level, FILTER_VALIDATE_INT)){
          $msg = '<div class="alert alert-danger">Community Richest Or Other Invalide Integer.</div>';
          return $msg;
       }else{
       	$sql = "INSERT INTO bd_community(com_name,com_location,com_url,fb_url,com_popular,	com_level) VALUES('$name','$location','$url','$fburl','$popular','$level')";
       	$result = $this->db->insert($sql);
        if ($result) {
          $msg = '<div class="alert alert-success">New Community Add Successfully!</div>';
          return $msg;
        }else{
        	$msg = '<div class="alert alert-danger">Data Not Inserted.</div>';
        	return $msg;
        }
       }
    }
 }
 public function getCommunityDelete($commId){
 	$sql = "DELETE FROM bd_community WHERE comyId = '$commId'";
 	$result = $this->db->delete($sql);
 	if ($result) {
 		$msg = '<div class="alert alert-success">Data Delete Successfully!</div>';
 		return $msg;
 	}else{
 		$msg = '<div class="alert alert-danger">Something went Wrong.</div>';
 		return $msg;
 	}
 }
 public function getCommunityEditResult($edit_Id){
 	$sql = "SELECT * FROM bd_community WHERE comyId = '$edit_Id'";
 	$result = $this->db->select($sql);
 	return $result;
 }
 public function communityUpdate($data){
      $name     = $data['community_name'];
      $location = $data['community_location'];
      $url      = $data['community_url'];
      $fburl    = $data['community_fburl'];
      $popular  = $data['community_popular'];
      $level    = $data['community_level'];
      $editId   = $data['editId'];
      if (empty($name) || empty($location) || empty($popular) || empty($level)) {
      	$msg = '<div class="alert alert-danger">Field Must Not Be Empty!</div>';
      	return $msg;
      }else{

      $name     = $this->fm->validation($name);
      $location = $this->fm->validation($location);
      $url      = $this->fm->validation($url);
      $fburl    = $this->fm->validation($fburl);
      $popular  = $this->fm->validation($popular);
      $level    = $this->fm->validation($level);

      $name     = mysqli_real_escape_string($this->db->link, $name);
      $location = mysqli_real_escape_string($this->db->link, $location);
      $url      = mysqli_real_escape_string($this->db->link, $url);
      $fburl    = mysqli_real_escape_string($this->db->link, $fburl);
      $popular  = mysqli_real_escape_string($this->db->link, $popular);
      $level    = mysqli_real_escape_string($this->db->link, $level);
      $editId   = mysqli_real_escape_string($this->db->link, $editId);
      
      if (!empty($url)) {
      	$url    = filter_var($url, FILTER_SANITIZE_URL);

      	if(strlen($url) > 100){
         $msg = '<div class="alert alert-danger">Community URL Should be Lessthan 100 Characters</div>';
      	 return $msg;
      	}elseif(!filter_var($url, FILTER_VALIDATE_URL)){
         $msg = '<div class="alert alert-danger">Community Website Invalidate URL.</div>';
      	 return $msg;
      	}
      }

      if (!empty($fburl)) {
      	$fburl   = filter_var($fburl, FILTER_SANITIZE_URL);
       if(strlen($fburl) > 100){
         $msg = '<div class="alert alert-danger">Facebook URL Should be Lessthan 100 Characters</div>';
      	 return $msg;
      	}elseif(!filter_var($fburl, FILTER_VALIDATE_URL)){
         $msg = '<div class="alert alert-danger">Facebook Invalide URL.</div>';
      	 return $msg;
      	}
      }

      if (strlen($name) > 120) {
      	 $msg = '<div class="alert alert-danger">Community Name Should be Lessthan 120 Characters</div>';
      	 return $msg;
      	}elseif(strlen($location) > 50){
         $msg = '<div class="alert alert-danger">Community Location Should be Lessthan 50 Characters</div>';
      	 return $msg;
      	}elseif(strlen($popular) > 10){
          $msg = '<div class="alert alert-danger">Community Popular Or General Should be Less than 10 Characters</div>';
       }elseif(!filter_var($popular, FILTER_VALIDATE_INT)){
          $msg = '<div class="alert alert-danger">Community Invalide Integer.</div>';
          return $msg;
       }elseif(strlen($level) > 10){
          $msg = '<div class="alert alert-danger">Community Richest Or Other Country Should be Less than 10 Characters</div>';
       }elseif(!filter_var($level, FILTER_VALIDATE_INT)){
          $msg = '<div class="alert alert-danger">Community Richest Or Other Invalide Integer.</div>';
          return $msg;
       }else{
       	$sqlCheck = "SELECT * FROM bd_community WHERE com_name = '$name' && com_location = '$location' && com_url = '$url' && fb_url = '$fburl' && com_popular = '$popular' && com_level = '$level' && comyId = '$editId'";
       	$result = $this->db->select($sqlCheck);
        if ($result != false) {
          $msg = '<div class="alert alert-danger">Data has no Change!</div>';
          return $msg;
        }else{
          $uSql = "UPDATE bd_community SET 
                          com_name     = '$name',
                          com_location = '$location',
                          com_url      = '$url',
                          fb_url       = '$fburl',
                          com_popular  = '$popular',
                          com_level    = '$level'
                          WHERE comyId = '$editId'";
          $resultUp = $this->db->update($uSql);
          if ($resultUp) {
          	$msg = '<div class="alert alert-success">Data Update Successfully!</div>';
          	return $msg;
          }else{
          	$msg = '<div class="alert alert-danger">Something went Wrong.</div>';
          	return $msg;
          }
        }
       }
    }
 }
 public function getCommunityReichest(){
  $sql = "SELECT * FROM bd_community WHERE com_level = '1' ORDER BY com_location ASC LIMIT 12";
  $result = $this->db->select($sql);
  return $result;
 }
 public function getCommunityPopular(){
  $sql = "SELECT * FROM bd_community WHERE com_popular = '2' ORDER BY com_location ASC LIMIT 12";
  $result = $this->db->select($sql);
  return $result;
 }
 public function getCommunityPerPage($start_from,$record_per_page){

  $orSql = "SELECT * FROM community_settings";
  $orResult = $this->db->select($orSql);
  if ($orResult) {
    $orShow  = $orResult->fetch_assoc();
    $orderId = $orShow['order_by'];
    $ascDesc = $orShow['asc_desc'];
  $sql = "SELECT * FROM bd_community ORDER BY $orderId $ascDesc LIMIT $start_from, $record_per_page";
  $result = $this->db->select($sql);
  return $result;
  }
 }
 public function getPaginationResult(){
  $sql = "SELECT * FROM bd_community ORDER BY comyId DESC";
  $result = $this->db->select($sql);
  return $result;
 }
 public function getCommunitySettingResult(){
  $sql = "SELECT * FROM community_settings";
  $result = $this->db->select($sql);
  return $result;
 }
 public function communitySettingUpdate($data){
   $per_page = $data['record_per_page_show'];
   $order_by = $data['order_by_result'];
   $asc_desc = $data['asc_desc_order'];
   $com_id   = $data['com_setting_Id'];
   if (empty($per_page) || empty($order_by) || empty($asc_desc) || empty($com_id)) {
    $msg = '<div class="alert alert-danger">Field Must not be Empty!</div>';
    return $msg;
   }else{
    $per_page = $this->fm->validation($per_page);
    $order_by = $this->fm->validation($order_by);
    $asc_desc = $this->fm->validation($asc_desc);
    $com_id   = $this->fm->validation($com_id);

    $per_page = mysqli_real_escape_string($this->db->link, $per_page);
    $order_by = mysqli_real_escape_string($this->db->link, $order_by);
    $asc_desc = mysqli_real_escape_string($this->db->link, $asc_desc);
    $com_id   = mysqli_real_escape_string($this->db->link, $com_id);

    $sql = "UPDATE community_settings SET
                    record_per_page = '$per_page',
                    order_by        = '$order_by',
                    asc_desc        = '$asc_desc',
                    com_setting_Id  = '$com_id'";
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
 /* Community Video Show Query Start */
 public function getVideoResult(){
  $sql = "SELECT * FROM community_video ORDER BY id DESC LIMIT 1";
  $result = $this->db->select($sql);
  return $result;
 }
 /* Community Video Update Query Start */
 public function communityVideoUpdate($data){

    $ty_title  = $data['community_ty_title'];
    $video_url = $data['community_video_url'];
    $v_height  = $data['community_video_height'];
    $v_width   = $data['community_video_width'];
    $allowfs   = $data['allowfs'];
    $autoplay  = $data['autoplay'];
    $v_id      = $data['com_vId'];
  
  if (empty($ty_title) || empty($video_url) || empty($v_height) || empty($v_width)) {
   $msg = '<div class="alert alert-danger">Field must not be Empty!</div>';
   return $msg;
  }else{
    $ty_title  = $this->fm->validation($ty_title);
    $video_url = $this->fm->validation($video_url);
    $v_height  = $this->fm->validation($v_height);
    $v_width   = $this->fm->validation($v_width);
    $allowfs   = $this->fm->validation($allowfs);
    $autoplay  = $this->fm->validation($autoplay);
    $v_id      = $this->fm->validation($v_id);

    $ty_title  = mysqli_real_escape_string($this->db->link, $ty_title);
    $video_url = mysqli_real_escape_string($this->db->link, $video_url);
    $v_height  = mysqli_real_escape_string($this->db->link, $v_height);
    $v_width   = mysqli_real_escape_string($this->db->link, $v_width);
    $allowfs   = mysqli_real_escape_string($this->db->link, $allowfs);
    $autoplay  = mysqli_real_escape_string($this->db->link, $autoplay);
    $v_id      = mysqli_real_escape_string($this->db->link, $v_id);
    $video_url = filter_var($video_url, FILTER_SANITIZE_URL);
    
    if (strlen($ty_title) > 130) {
      $msg = '<div class="alert alert-danger">Title Should be Lessthan 130 Characters!</div>';
      return $msg;
    }elseif(strlen($video_url) > 200){
     $msg = '<div class="alert alert-danger">URL Should be Lessthan 200 Characters!</div>';
     return $msg;
    }elseif(!filter_var($video_url, FILTER_VALIDATE_URL)){
     $msg = '<div class="alert alert-danger">Invalide URL!</div>';
     return $msg;
    }elseif(strlen($v_height) > 4){
     $msg = '<div class="alert alert-danger">Height Should be Lessthan 4 Characters!</div>';
     return $msg;
    }elseif(strlen($v_width) > 8){
     $msg = '<div class="alert alert-danger">Width Should be Lessthan 8 Characters!</div>';
     return $msg;
    }elseif(strlen($allowfs) > 5){
     $msg = '<div class="alert alert-danger">Width Should be Lessthan 8 Characters!</div>';
     return $msg;
    }elseif(strlen($autoplay) > 5){
     $msg = '<div class="alert alert-danger">Width Should be Lessthan 8 Characters!</div>';
     return $msg;
    }else{

    if (strpos($video_url, '=') !== false) {
      $v_url     = explode('=', $video_url);
    }else{
      $v_url     = explode('/', $video_url);
    }
    
    $v_ext     = end($v_url);
    $vuni_url  = 'https://www.youtube.com/embed/'.$v_ext;

    $vsql = "SELECT * FROM community_video WHERE com_v_title = '$ty_title' && com_yt_url = '$vuni_url' && video_height = '$v_height' && video_width = '$v_width' && allowfs = '$allowfs' && autoplay = '$autoplay' && id = '$v_id'";
    $vResult = $this->db->select($vsql);
    if ($vResult != false) {
      $msg = '<div class="alert alert-danger">Data Should not be Change!</div>';
      return $msg;
    }else{
      $viSql = "UPDATE community_video SET
                  com_v_title  = '$ty_title',
                  com_yt_url   = '$vuni_url',
                  video_height = '$v_height',
                  video_width  = '$v_width',
                       allowfs = '$allowfs',
                      autoplay = '$autoplay'
                      WHERE id = '$v_id'";
      $viResult = $this->db->update($viSql);
      if ($viResult) {
        $msg = '<div class="alert alert-success">Data Update Successfully!</div>';
        return $msg;
      }else{
        $msg = '<div class="alert alert-danger">Something went Wrong!</div>';
        return $msg;
      }
    }
    }
  }

 }
}