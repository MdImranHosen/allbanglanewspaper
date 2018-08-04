 <?php
/**
 * Bangla_news  This class use bangla district manage...
 */
class Bangla_news{

	private $db;
	private $fm;
	
	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}
	public function bnDistrictCountryAdd($data){
     if (empty($data['dis_con']) || empty($data['bn_cn'])) {
     	$msg = '<div class="alert alert-danger">Field Must Not be Empty!</div>';
     	return $msg;
     }else{
     	$dis_con = $this->fm->validation($data['dis_con']);
      $bd_div  = $this->fm->validation($data['bd_div']);
     	$bn_cn   = $this->fm->validation($data['bn_cn']);

     	$dis_con = mysqli_real_escape_string($this->db->link, $dis_con);
      $bd_div  = mysqli_real_escape_string($this->db->link, $bd_div);
     	$bn_cn   = mysqli_real_escape_string($this->db->link, $bn_cn);
        
      $sqlCk   = "SELECT * FROM bd_ns_cat WHERE bn_cn = '$bn_cn' LIMIT 1";
      $ckRst   = $this->db->select($sqlCk);
     	if ($ckRst != false) {
     		$msg = '<div class="alert alert-danger">This Zila Already Exists !</div>';
     		return $msg;
     	}else{

     	$sql = "INSERT INTO bd_ns_cat(dis_con,division,bn_cn) VALUES('$dis_con','$bd_div','$bn_cn')";
     	$result = $this->db->insert($sql);
     	if ($result) {
     		$msg = '<div class="alert alert-success">Insert Successfully!</div>';
     		return $msg;
     	}else{
     		$msg = '<div class="alert alert-danger">Data Not Inserted !</div>';
     		return $msg;
     	}
      }
     }
	}
	public function getBangladeshiDistrict(){
		$sql = "SELECT * FROM bd_ns_cat WHERE dis_con = '88' ORDER BY catId DESC";
		$result = $this->db->select($sql);
		return $result;
	}
	public function getBanglaForeign(){
		$sql = "SELECT * FROM bd_ns_cat WHERE dis_con = '99' ORDER BY catId DESC";
		$result = $this->db->select($sql);
		return $result;
	}
	public function getDeleteBnNscatId($id){
		$sql = "DELETE FROM bd_ns_cat WHERE catId = '$id'";
		$result = $this->db->delete($sql);
		if ($result) {
			$msg = '<div class="alert alert-success">Data Deleted !</div>';
			return $msg;
		}else{
			$msg = '<div class="alert alert-danger">Not Deleted !</div>';
			return $msg;
		}
	}
    public function getIdByResultShow($id){
        $sql = "SELECT * FROM bd_ns_cat WHERE catId = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function bnDistrictCountryEditById($data,$id){
      if (empty($data['dis_con']) || empty($data['bn_cn'])) {
        $msg = '<div class="alert alert-danger">Field Must Not be Empty!</div>';
        return $msg;
     }else{
        $dis_con = $this->fm->validation($data['dis_con']);
        $bd_div  = $this->fm->validation($data['bd_div']);
        $bn_cn   = $this->fm->validation($data['bn_cn']);

        $dis_con = mysqli_real_escape_string($this->db->link, $dis_con);
        $bd_div  = mysqli_real_escape_string($this->db->link, $bd_div);
        $bn_cn   = mysqli_real_escape_string($this->db->link, $bn_cn);
        
        /*$sqlCk   = "SELECT * FROM bd_ns_cat WHERE bn_cn = '$bn_cn' LIMIT 1";
        $ckRst   = $this->db->select($sqlCk);
        if ($ckRst != false) {
            $msg = '<div class="alert alert-danger">This Email Already Exists !</div>';
            return $msg;
        }else{*/
        $sql = "UPDATE bd_ns_cat SET
                   dis_con  = '$dis_con',
                   division = '$bd_div',
                   bn_cn    = '$bn_cn'
                WHERE catId = '$id'";
        $result = $this->db->update($sql);
        if ($result) {
            $msg = '<div class="alert alert-success">Update Successfully!</div>';
            return $msg;
        }else{
            $msg = '<div class="alert alert-danger">Data Not Updated !</div>';
            return $msg;
        }
      /*}*/
     }  
    }
	public function bnNewspaperAdd($data, $file){
     if (empty($data['bn_wdns']) || empty($data['newsname']) || empty($data['dyson']) || empty($data['news_url'])) {
     	$msg = '<div class="alert alert-danger">Field must not be Empty!</div>';
        return $msg;
     }else{
     	$bn_wdns    = $this->fm->validation($data['bn_wdns']);
     	$bnns_wdid  = $this->fm->validation($data['bnns_wdid']);
     	$newsname   = $this->fm->validation($data['newsname']);
     	$dyson      = $this->fm->validation($data['dyson']);
     	$news_url   = $this->fm->validation($data['news_url']);
     	$ponsp      = $this->fm->validation($data['ponsp']);
      $date_time  = $this->fm->validation($data['date_time']);
     	
      $bn_wdns    = mysqli_real_escape_string($this->db->link, $bn_wdns);
     	$bnns_wdid  = mysqli_real_escape_string($this->db->link, $bnns_wdid);
     	$newsname   = mysqli_real_escape_string($this->db->link, $newsname);
     	$dyson      = mysqli_real_escape_string($this->db->link, $dyson);
     	$news_url   = mysqli_real_escape_string($this->db->link, $news_url);
     	$ponsp      = mysqli_real_escape_string($this->db->link, $ponsp);
      $date_time  = mysqli_real_escape_string($this->db->link, $date_time);
      $news_url   = filter_var($news_url, FILTER_SANITIZE_URL);

     	$parmit     = array('png','jpg','jpeg','gif');
     	$file_name  = $file['nsimg']['name'];
     	$file_size  = $file['nsimg']['size'];
     	$file_tmp   = $file['nsimg']['tmp_name'];

     	$div        = explode('.', $file_name);
     	$file_ext   = strtolower(end($div));
     	$unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
     	$upload_img = "upload/newspaper_logo_img/".$unique_img;

     	if (empty($file_name)) {
     		$msg = '<div class="alert alert-danger">Image Field must not be Empty!</div>';
     		return $msg;
     	}elseif($file_size > 524288){
           $msg = '<div class="alert alert-danger">Image Size Should be lessthen 512 kb </div>';
           return $msg;
     	}elseif(in_array($file_ext, $parmit) === false){
           $msg = '<div class="alert alert-danger">
                  You can upload only:-'.implode(',', $parmit).'
                  </div>';
           return $msg;
     	}elseif(!filter_var($bnns_wdid, FILTER_VALIDATE_INT)){
          $msg = '<div class="alert alert-danger">BD and World Invalid Intiger</div>';
          return $msg;
      }elseif(strlen($newsname) > 90){
          $msg = '<div class="alert alert-danger">Newspaper Name latter should be lessthen 90</div>';
          return $msg;
      }elseif(!filter_var($news_url, FILTER_VALIDATE_URL)){
          $msg = '<div class="alert alert-danger">Invalid URL</div>';
          return $msg;
      }elseif(strlen($news_url) > 120){
          $msg = '<div class="alert alert-danger">Newspaper Name latter should be lessthen 300</div>';
          return $msg;
      }else{
     		$movefile = '../'.$upload_img;
     		move_uploaded_file($file_tmp, $movefile);
     		$sql = "INSERT INTO bd_ns_paper(catId,ns_name,dwa,ns_img,ns_url,gpe,date_time) VALUES('$bnns_wdid','$newsname','$dyson','$upload_img','$news_url','$ponsp','$date_time')";
            $result = $this->db->insert($sql);
            if ($result) {
                $msg = '<div class="alert alert-success">Inserted Successfully!</div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger">Data not Inserted</div>';
                return $msg;
            }

     	}
     	
     }
	}
   public function getResultShowById($id){
    $sql = "SELECT * FROM bd_ns_paper WHERE id = '$id'";
    $result = $this->db->select($sql);
    return $result;
   }
   public function bnNewspaperUpdate($data, $file, $Id){
     if (empty($data['bn_wdns']) || empty($data['newsname']) || empty($data['dyson']) || empty($data['news_url'])) {
      $msg = '<div class="alert alert-danger">Field must not be Empty!</div>';
        return $msg;
     }else{
      $bn_wdns    = $this->fm->validation($data['bn_wdns']);
      $bnns_wdid  = $this->fm->validation($data['bnns_wdid']);
      $newsname   = $this->fm->validation($data['newsname']);
      $dyson      = $this->fm->validation($data['dyson']);
      $news_url   = $this->fm->validation($data['news_url']);
      $ponsp      = $this->fm->validation($data['ponsp']);
      
      $bn_wdns    = mysqli_real_escape_string($this->db->link, $bn_wdns);
      $bnns_wdid  = mysqli_real_escape_string($this->db->link, $bnns_wdid);
      $newsname   = mysqli_real_escape_string($this->db->link, $newsname);
      $dyson      = mysqli_real_escape_string($this->db->link, $dyson);
      $news_url   = mysqli_real_escape_string($this->db->link, $news_url);
      $ponsp      = mysqli_real_escape_string($this->db->link, $ponsp);
      $news_url   = filter_var($news_url, FILTER_SANITIZE_URL);

      $parmit     = array('png','jpg','jpeg','gif');
      $file_name  = $file['nsimg']['name'];
      $file_size  = $file['nsimg']['size'];
      $file_tmp   = $file['nsimg']['tmp_name'];

      $div        = explode('.', $file_name);
      $file_ext   = strtolower(end($div));
      $unique_img = substr(md5(time()), 0, 10).'.'.$file_ext;
      $upload_img = "upload/newspaper_logo_img/".$unique_img;

      if (!empty($file_name)) {
        
        $sqlimgulink = "SELECT * FROM bd_ns_paper WHERE id = '$Id'";
        $resultimgun = $this->db->select($sqlimgulink);
        if ($resultimgun) {
          while ($unResult = $resultimgun->fetch_assoc()) {
                  $newimg  = $unResult['ns_img'];
                  $imlink  = '../'.$newimg;
                  if ($unResult['ns_img'] != NULL) {
                    if (!file_exists($imlink)) {
                      
                    }else{
                      unlink($imlink);
                    }
                  }
          }
        }

      if($file_size > 524288){
           $msg = '<div class="alert alert-danger">Image Size Should be lessthen 512 kb </div>';
           return $msg;
      }elseif(in_array($file_ext, $parmit) === false){
           $msg = '<div class="alert alert-danger">
                  You can upload only:-'.implode(',', $parmit).'
                  </div>';
           return $msg;
      }elseif(!filter_var($bnns_wdid, FILTER_VALIDATE_INT)){
          $msg = '<div class="alert alert-danger">BD and World Invalid Intiger</div>';
          return $msg;
        }elseif(strlen($newsname) > 50){
          $msg = '<div class="alert alert-danger">Newspaper Name latter should be lessthen 50 </div>';
          return $msg;
        }elseif(!filter_var($news_url, FILTER_VALIDATE_URL)){
          $msg = '<div class="alert alert-danger">Invalid URL</div>';
          return $msg;
        }elseif(strlen($news_url) > 120){
          $msg = '<div class="alert alert-danger">Newspaper Name latter should be lessthen 300</div>';
          return $msg;
        }else{
        $movefile = '../'.$upload_img;
        move_uploaded_file($file_tmp, $movefile);
        $sql = "UPDATE bd_ns_paper SET 
                  catId   = '$bnns_wdid',
                  ns_name = '$newsname',
                  dwa     = '$dyson',
                  ns_img  = '$upload_img',
                  ns_url  = '$news_url',
                  gpe     = '$ponsp'
                 WHERE id = '$Id'";
            $result = $this->db->update($sql);
            if ($result) {
                $msg = '<div class="alert alert-success">Updated Successfully!</div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger">Data not Updated!</div>';
                return $msg;
            }

       }
      }else{
      # image..not change....
      
       if(!filter_var($bnns_wdid, FILTER_VALIDATE_INT)){
          $msg = '<div class="alert alert-danger">BD and World Invalid Intiger</div>';
          return $msg;
        }elseif(strlen($newsname) > 50){
          $msg = '<div class="alert alert-danger">Newspaper Name latter should be lessthen 50 </div>';
          return $msg;
        }elseif(!filter_var($news_url, FILTER_VALIDATE_URL)){
          $msg = '<div class="alert alert-danger">Invalid URL</div>';
          return $msg;
        }elseif(strlen($news_url) > 120){
          $msg = '<div class="alert alert-danger">Newspaper Name latter should be lessthen 300</div>';
          return $msg;
        }else{
        $sql = "UPDATE bd_ns_paper SET 
                  catId   = '$bnns_wdid',
                  ns_name = '$newsname',
                  dwa     = '$dyson',
                  ns_url  = '$news_url',
                  gpe     = '$ponsp'
                 WHERE id = '$Id'";
            $result = $this->db->update($sql);
            if ($result) {
                $msg = '<div class="alert alert-success">Updated Successfully!</div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger">Data not Updated!</div>';
                return $msg;
            }

       }

      }
      

     }
  }
    public function getBnNsCatName($id){
      $sql = "SELECT * FROM bd_ns_cat WHERE catId = '$id'";
      $result = $this->db->select($sql);
      return $result;
    }
    public function getNewsCategorywayisShow($id){
      $sql = "SELECT * FROM bd_ns_paper WHERE dwa = '1' && catId ='$id'";
      $result = $this->db->select($sql);
      return $result;
    }
     public function getNewsCategorywayisweekiShow($id){
      $sql = "SELECT * FROM bd_ns_paper WHERE dwa = '2' && catId ='$id'";
      $result = $this->db->select($sql);
      return $result;
    }
     public function getNewsCategoryAnotherShow($id){
      $sql = "SELECT * FROM bd_ns_paper WHERE dwa = '3' && catId ='$id'";
      $result = $this->db->select($sql);
      return $result;
    }
    public function getNewsCategoryPopulerShow($id){
      $sql = "SELECT * FROM bd_ns_paper WHERE gpe = '44' && catId ='$id'";
      $result = $this->db->select($sql);
      return $result;
    }
    public function getNewsCategoryEpaperShow($id){
      $sql = "SELECT * FROM bd_ns_paper WHERE gpe = '33' && catId ='$id'";
      $result = $this->db->select($sql);
      return $result;
    }
    public function getNewspaperDeleteId($id){
      $sqlchek = "SELECT * FROM bd_ns_paper WHERE id = '$id'";
      $checkResult = $this->db->select($sqlchek);
      if ($checkResult) {
          while ($result = $checkResult->fetch_assoc()) {
                  $newslogo = $result['ns_img'];
                  $imglink  = '../'.$newslogo;
                 if ($result['ns_img'] != NULL) {
                    if (!file_exists($imglink)) {
                      
                  }else{
                    unlink($imglink);
                  }
                 }
                  
          }
      }
      $sql = "DELETE FROM bd_ns_paper WHERE id = '$id'";
      $result = $this->db->delete($sql);
      if ($result) {
          $msg = '<div class="alert alert-success">Newspaper Delete Successfully!</div>';
          return $msg;
      }else{
        $msg = '<div class="alert alert-danger">Newspaper Not Deleted !</div>';
        return $msg;
      }
    }
    public function getDhakaDivisionZila(){
        $sql = "SELECT * FROM bd_ns_cat WHERE division = '1366' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getKhulnaDivisionZila(){
        $sql = "SELECT * FROM bd_ns_cat WHERE division = '1960' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getChittagongDivisionZila(){
        $sql = "SELECT * FROM bd_ns_cat WHERE division = '2015' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getRajshahiDivisionZila(){
        $sql = "SELECT * FROM bd_ns_cat WHERE division = '6000' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getBarisalDivisionZila(){
        $sql = "SELECT * FROM bd_ns_cat WHERE division = '1993' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getRangpurDivisionZila(){
        $sql = "SELECT * FROM bd_ns_cat WHERE division = '5585' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getSylhetDivisionZila(){
        $sql = "SELECT * FROM bd_ns_cat WHERE division = '3100' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getMymensinghDivisionZila(){
        $sql = "SELECT * FROM bd_ns_cat WHERE division = '2200' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getWroldCountry(){
        $sql = "SELECT * FROM bd_ns_cat WHERE dis_con = '99' ORDER BY catId DESC";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getFirstIdByPaperlist(){
      $sql = "SELECT * FROM bd_ns_cat WHERE dis_con = '88' ORDER BY catId DESC LIMIT 1";
      $result = $this->db->select($sql);
      return $result;
    }
   public function getAllbanglanewspaper(){
    $sql = "SELECT * FROM bd_ns_paper WHERE gpe = '22' ORDER BY catId DESC LIMIT 50";
    $result = $this->db->select($sql);
    return $result;
   }
   public function getEpaperList(){
    $sql = "SELECT * FROM bd_ns_paper WHERE gpe = '33' ORDER BY catId DESC LIMIT 50";
    $result = $this->db->select($sql);
    return $result;
   }
}