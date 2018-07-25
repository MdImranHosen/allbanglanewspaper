<?php
//Radio class manage of bangla radio ...
class Radio{
	private $db;
	private $fm;
	
 public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
 public function getAddBanglaRadio($data, $file){
  if (empty($data['radoname']) || empty($data['radiocat']) || empty($data['radio_url'])) {
    $msg = '<div class="alert alert-warning" role="alert">
                Name Category and Website url must not be Empty!
               </div>';
            return $msg;
  }else{
    $radoname     = $this->fm->validation($data['radoname']);
    $radiocat     = $this->fm->validation($data['radiocat']);
    $radio_city   = $this->fm->validation($data['radio_city']);
    $stream_url   = $this->fm->validation($data['stream_url']);
    $radio_url    = $this->fm->validation($data['radio_url']);
    $date_time    = $this->fm->validation($data['date_time']);

    $radoname     = mysqli_real_escape_string($this->db->link, $radoname);
    $radiocat     = mysqli_real_escape_string($this->db->link, $radiocat);
    $radio_city   = mysqli_real_escape_string($this->db->link, $radio_city);
    $stream_url   = mysqli_real_escape_string($this->db->link, $stream_url);
    $radio_url    = mysqli_real_escape_string($this->db->link, $radio_url);
    $date_time    = mysqli_real_escape_string($this->db->link, $date_time);
      
	  $permited     = array('jpg', 'png', 'gif', 'jpeg');
	  $file_name    = $file['radioiconimg']['name'];
	  $file_size    = $file['radioiconimg']['size'];
	  $file_temp    = $file['radioiconimg']['tmp_name'];

	  $div          = explode('.', $file_name);
	  $file_ext     = strtolower(end($div));
	  $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	  $upload_image = "upload/radio/".$unique_image;

	   
    if (!empty($stream_url)) {
      if(!filter_var($stream_url, FILTER_VALIDATE_URL) !== false){
       $msg = '<div class="alert alert-danger" role="alert">
                  Invalid Stream URL!
                 </div>';
              return $msg;
    }
    }


    if(!filter_var($radio_url, FILTER_VALIDATE_URL) !== false){
       $msg = '<div class="alert alert-danger" role="alert">
                  Invalid Website URL!
                 </div>';
              return $msg;
    }elseif(empty($file_name)){
        $msg = '<div class="alert alert-warning" role="alert">
                  Image Field must not be Empty!
                 </div>';
              return $msg;
    }elseif($file_size > 1048576){
         $msg = '<div class="alert alert-danger" role="alert">
               Image Size Should be less then 1 MB !
             </div>';
           return $msg;
	  }elseif(in_array($file_ext, $permited) === false){
        $msg = '<div class="alert alert-danger" role="alert">
                 You can uploads only:-'.implode(', ', $permited).'</div>';
              return $msg;
	  }else{
	  	$move_file = '../'.$upload_image;
	  	move_uploaded_file($file_temp, $move_file);
	  	$sql = "INSERT INTO bd_radio(radio_n, radio_cat, city_country, stream_url, radio_url, radio_img, date_time) VALUES('$radoname','$radiocat','$radio_city','$stream_url','$radio_url','$upload_image','$date_time')";
	  	$result = $this->db->insert($sql);
	  	if ($result) {
	  		$msg = '<div class="alert alert-success" role="alert">
               Data Inserted Successfully!
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
 public function getDeleteRadioId($id){

 	$checkSql = "SELECT * FROM bd_radio WHERE id = '$id'";
 	$checkResult = $this->db->select($checkSql);
 	if ($checkResult) {
 		while ($cResult = $checkResult->fetch_assoc()) {
 			 $radio_img = $cResult['radio_img'];
 			 $rd_img_li = '../'.$radio_img;
       if ($cResult['radio_img'] != NULL) {
        
 			 if (!file_exists($rd_img_li)) {

 			 }else{
                unlink($rd_img_li);
 			 }
       }
 		}

 	}

 	$sql = "DELETE FROM bd_radio WHERE id = '$id'";
 	$result = $this->db->delete($sql);
 	if ($result) {
 		$msg = '<div class="alert alert-success">Radio List to Delete Id.</div>';
 		return $msg;
 	}else{
 		$msg = '<div class="alert alert-danger">Something Worng !</div>';
 		return $msg;
 	}
 }

 public function getBangladeshiRadio(){
 	$sql = "SELECT * FROM bd_radio WHERE radio_cat = '1' ORDER BY id DESC";
 	$result = $this->db->select($sql);
 	return $result;
 }

  public function getIndianBanglaRadio(){
 	$sql = "SELECT * FROM bd_radio WHERE radio_cat = '2' ORDER BY id DESC";
 	$result = $this->db->select($sql);
 	return $result;
 }
   public function getAnotherBanglaRadio(){
 	$sql = "SELECT * FROM bd_radio WHERE radio_cat = '3' ORDER BY id DESC";
 	$result = $this->db->select($sql);
 	return $result;
 }
 public function getRadioIdEditResultShow($id){
 	$sql = "SELECT * FROM bd_radio WHERE id = '$id'";
 	$result = $this->db->select($sql);
 	return $result;
 }

 public function getUpdateBanglaRadio($data, $file, $Id){
  if (empty($data['radioname_edit']) || empty($data['radiocat_edit']) || empty($data['radio_url_edit'])) {
     $smg = '<div class="alert alert-danger">
           Name Category and Website url must not be Empty!
      </div>';
      return $smg;
   }else{
      
      $radioname_edit = $this->fm->validation($data['radioname_edit']);
      $radiocat_edit  = $this->fm->validation($data['radiocat_edit']);
      $city_edit      = $this->fm->validation($data['city_edit']);
      $stream_uedit   = $this->fm->validation($data['stream_uedit']);
      $radio_url_edit = $this->fm->validation($data['radio_url_edit']);
      
      
      $radioname_edit = mysqli_real_escape_string($this->db->link, $radioname_edit);
      $radiocat_edit  = mysqli_real_escape_string($this->db->link, $radiocat_edit);
      $city_edit      = mysqli_real_escape_string($this->db->link, $city_edit);
      $stream_uedit   = mysqli_real_escape_string($this->db->link, $stream_uedit);
      $radio_url_edit = mysqli_real_escape_string($this->db->link, $radio_url_edit);

      $permitted      = array('png', 'jpg', 'jpeg', 'gif');
      $file_name      = $file['radioiconimg_edit']['name'];
      $file_size      = $file['radioiconimg_edit']['size'];
      $file_temp      = $file['radioiconimg_edit']['tmp_name'];

      $div            = explode('.', $file_name);
      $image_ext      = strtolower(end($div));
      $unique_image   = substr(md5(time()), 0, 10).'.'.$image_ext;
      $upload_image   = "upload/radio/".$unique_image;

     #extra image input query....start.....

         if (!empty($file_name)) {
          
          if($file_size > 1048576){
             $msg = '<div class="alert alert-danger" role="alert">
                   Image Size Should be less then 1 MB !
                 </div>';
               return $msg;
          }elseif(in_array($image_ext, $permitted) === false){
              $msg = '<div class="alert alert-danger" role="alert">
                       You can uploads only:-'.implode(', ', $permitted).'</div>';
                    return $msg;
          }
        }elseif(!filter_var($radio_url_edit, FILTER_VALIDATE_URL) !== false){
          $msg = '<div class="alert alert-danger" role="alert">
                  Radio url is not Validate !
                 </div>';
               return $msg;
       	}

        $checkSqlEr = "SELECT * FROM bd_radio WHERE radio_n = '$radioname_edit' AND radio_cat = '$radiocat_edit' AND radio_url = 'radio_url_edit' AND id = '$Id'";
         $checkReresult = $this->db->select($checkSqlEr);
         if ($checkReresult != false) {
         	$msg = '<div class="text-red">This Radio Information Not Updated !</div>';
         	return $msg;
         }else{

        if (empty($file_name)) {

          $editSql = "UPDATE bd_radio
                   SET 
                 radio_n      = '$radioname_edit',
                 radio_cat    = '$radiocat_edit',
                 city_country = '$city_edit',
                 stream_url   = '$stream_uedit',
                 radio_url    = '$radio_url_edit'
                 WHERE id     = '$Id'";
          $editResult = $this->db->update($editSql);
          if ($editResult) {
           $msg = '<div class="alert alert-success">
              Radio Id Updated Successfully!
            </div>';
            return $msg;
          }else{
            $msg = '<div class="alert alert-danger">
              Radio Id Not Updated!
            </div>';
            return $msg;
          }
          
        }else{

      $moveFile = "../".$upload_image;
      move_uploaded_file($file_temp, $moveFile);

      $editSql = "UPDATE bd_radio
                   SET 
                 radio_n      = '$radioname_edit',
                 radio_cat    = '$radiocat_edit',
                 city_country = '$city_edit',
                 stream_url   = '$stream_uedit',
                 radio_url    = '$radio_url_edit',
                 radio_img    = '$upload_image'
                 WHERE id     = '$Id'";
      $editResult = $this->db->update($editSql);
      if ($editResult) {
       $msg = '<div class="alert alert-success">
          Radio Id Updated Successfully!
        </div>';
        return $msg;
      }else{
        $msg = '<div class="alert alert-danger">
          Radio Id Not Updated!
        </div>';
        return $msg;
      }

    }
    }
   }
 }

 public function getLiveRadio($id){
  $sql = "SELECT * FROM bd_radio WHERE id = '$id'";
  $result = $this->db->select($sql);
  return $result;
 }

}