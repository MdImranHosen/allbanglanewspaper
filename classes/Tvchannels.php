<?php
/**
 * Class of Tvchannels manage for tv query..
 */
class Tvchannels{
	
	private $db;
	private $fm;
    
    public function __construct(){
    	$this->db = new Database();
    	$this->fm = new Format();
    }

 public function getAddBanglaTv($data, $file){
  if (empty($data['tvname']) || empty($data['tvcat']) || empty($data['tv_city']) || empty($data['tv_url'])) {
    $msg = '<div class="alert alert-warning" role="alert">
                Name Category and Website url must not be Empty!
               </div>';
            return $msg;
  }else{
    $tvname    = $this->fm->validation($data['tvname']);
    $tvcat     = $this->fm->validation($data['tvcat']);
    $tv_city   = $this->fm->validation($data['tv_city']);
    $tv_url    = $this->fm->validation($data['tv_url']);
    $date_time = $this->fm->validation($data['date_time']);

    $tvname    = mysqli_real_escape_string($this->db->link, $tvname);
    $tvcat     = mysqli_real_escape_string($this->db->link, $tvcat);
    $tv_city   = mysqli_real_escape_string($this->db->link, $tv_city);
    $tv_url    = mysqli_real_escape_string($this->db->link, $tv_url);
    $date_time = mysqli_real_escape_string($this->db->link, $date_time);
      
  	$permited  = array('jpg', 'png', 'gif', 'jpeg');
  	$file_name = $file['tviconimg']['name'];
  	$file_size = $file['tviconimg']['size'];
  	$file_temp = $file['tviconimg']['tmp_name'];

  	$div          = explode('.', $file_name);
  	$file_ext     = strtolower(end($div));
  	$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
  	$upload_image = "upload/tv/".$unique_image;
    
    if(!filter_var($tv_url, FILTER_VALIDATE_URL) !== false){
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
	  	$sql = "INSERT INTO bd_tv(tv_n, tv_cat, city_tv, tvc_url, tv_img, date_time) VALUES('$tvname','$tvcat','$tv_city','$tv_url','$upload_image','$date_time')";
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
 public function getDeleteTvId($id){

 	$checkSql = "SELECT * FROM bd_tv WHERE tvId = '$id'";
 	$checkResult = $this->db->select($checkSql);
 	if ($checkResult) {
 		while ($cResult = $checkResult->fetch_assoc()) {
 			   $tv_img  = $cResult['tv_img'];
 			   $tv_link = '../'.$tv_img;
 			 if (!file_exists($tv_link)) {

 			 }else{
                unlink($tv_link);
 			 }
 		}
 	}

 	$sql = "DELETE FROM bd_tv WHERE tvId = '$id'";
 	$result = $this->db->delete($sql);
 	if ($result) {
 		$msg = '<div class="alert alert-success">TV Channels List to Delete Id.</div>';
 		return $msg;
 	}else{
 		$msg = '<div class="alert alert-danger">Something Worng !</div>';
 		return $msg;
 	}
  }

  public function getBangladeshiTv(){
 	$sql = "SELECT * FROM bd_tv WHERE tv_cat = '1' ORDER BY tvId DESC";
 	$result = $this->db->select($sql);
 	return $result;
   }

  public function getIndianBanglaTv(){
 	$sql = "SELECT * FROM bd_tv WHERE tv_cat = '2' ORDER BY tvId DESC";
 	$result = $this->db->select($sql);
 	return $result;
   }
   public function getAnotherBanglaTv(){
 	$sql = "SELECT * FROM bd_tv WHERE tv_cat = '3' ORDER BY tvId DESC";
 	$result = $this->db->select($sql);
 	return $result;
   }
   public function getTvIdEditResultShow($id){
 	$sql = "SELECT * FROM bd_tv WHERE tvId = '$id'";
 	$result = $this->db->select($sql);
 	return $result;
   }

    public function getUpdateBanglaTv($data, $file, $Id){
  if (empty($data['tvNameEdit']) || empty($data['tvCatEdit']) || empty($data['tvurlEdit'])) {
     $smg = '<div class="alert alert-danger">
           Name Category and Website url must not be Empty!
      </div>';
      return $smg;
   }else{
      
    $tvNameEdit = $this->fm->validation($data['tvNameEdit']);
    $tvCatEdit  = $this->fm->validation($data['tvCatEdit']);
    $tvCityEdit = $this->fm->validation($data['tvCityEdit']);
    $tvurlEdit  = $this->fm->validation($data['tvurlEdit']);

    $tvNameEdit = mysqli_real_escape_string($this->db->link, $tvNameEdit);
    $tvCatEdit  = mysqli_real_escape_string($this->db->link, $tvCatEdit);
    $tvCityEdit = mysqli_real_escape_string($this->db->link, $tvCityEdit);
    $tvurlEdit  = mysqli_real_escape_string($this->db->link, $tvurlEdit);
      
	$permited   = array('jpg', 'png', 'gif', 'jpeg');
	$file_name  = $file['tvOImgEdit']['name'];
	$file_size  = $file['tvOImgEdit']['size'];
	$file_temp  = $file['tvOImgEdit']['tmp_name'];

	$div          = explode('.', $file_name);
	$file_ext     = strtolower(end($div));
	$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	$upload_image = "upload/tv/".$unique_image;

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
        }elseif(!filter_var($tvurlEdit, FILTER_VALIDATE_URL) !== false){
          $msg = '<div class="alert alert-danger" role="alert">
                  TV url is not Validate !
                 </div>';
               return $msg;
       	}

        
        if (empty($file_name)) {

          $editSql = "UPDATE bd_tv
                   SET 
                   tv_n     = '$tvNameEdit',
                   tv_cat   = '$tvCatEdit',
                   city_tv  = '$tvCityEdit',
                   tvc_url  = '$tvurlEdit'
                 WHERE tvId = '$Id'";
          $editResult = $this->db->update($editSql);
          if ($editResult) {
           $msg = '<div class="alert alert-success">
              TV Id Updated Successfully!
            </div>';
            return $msg;
          }else{
            $msg = '<div class="alert alert-danger">
              TV Id Not Updated!
            </div>';
            return $msg;
          }
          
        }else{

      $moveFile = "../".$upload_image;
      move_uploaded_file($file_temp, $moveFile);

      $editSql = "UPDATE bd_tv
                   SET 
                 tv_n      = '$tvNameEdit',
                 tv_cat    = '$tvCatEdit',
                 city_tv   = '$tvCityEdit',
                 tvc_url   = '$tvurlEdit',
                 tv_img    = '$upload_image'
                WHERE tvId = '$Id'";
      $editResult = $this->db->update($editSql);
      if ($editResult) {
       $msg = '<div class="alert alert-success">
          TV Id Updated Successfully!
        </div>';
        return $msg;
      }else{
        $msg = '<div class="alert alert-danger">
          TV Id Not Updated!
        </div>';
        return $msg;
      }

    }
   }
 }
  public function getTvIdbySite($id){
    $sql = "SELECT * FROM bd_tv WHERE tvId = '$id'";
    $result = $this->db->select($sql);
    return $result;
  }
}