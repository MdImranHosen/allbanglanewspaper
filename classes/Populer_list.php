<?php
/**
* Populer List class for Populer bangla news paper menu.....
*/
class Populer_list{
	private $db;
	private $fm;
	
 public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

 public function getAddPopulerNewsInsert($data, $file){
     
      $addnewsname      = $this->fm->validation($data['addnewsname']);
      $populerNewstitle = $this->fm->validation($data['populerNewstitle']);
      $addnews_url      = $this->fm->validation($data['addnews_url']);

      $addnewsname      = mysqli_real_escape_string($this->db->link, $addnewsname);
      $populerNewstitle = mysqli_real_escape_string($this->db->link, $populerNewstitle);
      $addnews_url      = mysqli_real_escape_string($this->db->link, $addnews_url);
      
      $permited         = array('jpg', 'png', 'gif', 'jpeg');
	    $file_name        = $file['populerNewsImage']['name'];
	    $file_size        = $file['populerNewsImage']['size'];
	    $file_temp        = $file['populerNewsImage']['tmp_name'];

	    $div              = explode('.', $file_name);
	    $file_ext         = strtolower(end($div));
	    $unique_image     = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $upload_image     = "upload/newspaper_logo_img/".$unique_image;

	  if ($addnewsname == '' || $populerNewstitle == '' || $addnews_url == '') {
	  	$msg = '<div class="alert alert-warning" role="alert">
                  Field must not be Empty!
                 </div>';
              return $msg;
	  }elseif(!filter_var($addnews_url, FILTER_VALIDATE_URL) !== false){
       $msg = '<div class="alert alert-danger" role="alert">
                  Invalid URL!
                 </div>';
              return $msg;
    }elseif(empty($file_name)){
        $msg = '<div class="alert alert-warning" role="alert">
                  অবশ্যই ছবির ফিল্ড টি পূরণ  করতে হবে
                 </div>';
              return $msg;
    }elseif($file_size > 2097152){
         $msg = '<div class="alert alert-danger" role="alert">
               Image Size Should be less then 2 MB !
             </div>';
           return $msg;
	  }elseif(in_array($file_ext, $permited) === false){
        $msg = '<div class="alert alert-danger" role="alert">
                 You can uploads only:-'.implode(', ', $permited).'</div>';
              return $msg;
	  }else{
	  	move_uploaded_file($file_temp, $upload_image);
	  	$sql = "INSERT INTO populer_bangla_news(name, title, news_url, image) VALUES('$addnewsname','$populerNewstitle','$addnews_url','$upload_image')";
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
 public function getPopulerNewsPaper(){
 	$sql = "SELECT * FROM populer_bangla_news";
 	$result = $this->db->select($sql);
 	return $result;
 }


 public function getPopulerNewsUpdateResult($id){
      $sql = "SELECT * FROM populer_bangla_news WHERE id = '$id'";
      $result = $this->db->select($sql);
      return $result;
 }
 public function getAddPopulerNewsUpdate($data, $file, $id){
      $editnewsname = $this->fm->validation($data['editnewsname']);
      $edittitle    = $this->fm->validation($data['edittitle']);
      $editnews_url = $this->fm->validation($data['editnews_url']);

      $editnewsname = mysqli_real_escape_string($this->db->link, $editnewsname);
      $edittitle    = mysqli_real_escape_string($this->db->link, $edittitle);
      $editnews_url = mysqli_real_escape_string($this->db->link, $editnews_url);
      
      $permited     = array('jpg', 'png', 'gif', 'jpeg');
      $file_name    = $file['editImage']['name'];
      $file_size    = $file['editImage']['size'];
      $file_temp    = $file['editImage']['tmp_name'];

      $div          = explode('.', $file_name);
      $file_ext     = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
      $upload_image = "upload/newspaper_logo_img/".$unique_image;

      if ($editnewsname == '' || $edittitle == '' || $editnews_url == '') {
        $msg = '<div class="alert alert-warning" role="alert">
               Field must not be empty!
             </div>';
           return $msg;
      }else{

       if (!empty($file_name)) {

        $delSql = "SELECT * FROM populer_bangla_news WHERE id = '$id'";
            $delResult = $this->db->select($delSql);
            if ($delResult) {
               while ($delImage = $delResult->fetch_assoc()) {
                      $delLink  = $delImage['image'];
                        unlink($delLink);
               }
            }


      if(!filter_var($editnews_url, FILTER_VALIDATE_URL) !== false){
         $msg = '<div class="alert alert-danger" role="alert">
                  Invalid URL- https://www.exemple.com !
                 </div>';
              return $msg;
       }elseif ($file_size > 2097152) {

        $msg = '<div class="alert alert-danger" role="alert">
           ছবির সাইজ অবশ্যই ২ এম্বি এর কম হতে হবে
         </div>';
       return $msg;

      }elseif (in_array($file_ext, $permited) === false) {
        $msg = '<div class="alert alert-danger" role="alert">
             You can uploads only:-'.implode(', ', $permited).'</div>';
          return $msg;
      } else{
      move_uploaded_file($file_temp, $upload_image);

        $query = "UPDATE populer_bangla_news
                    SET
                    name        = '$editnewsname',
                    title       = '$edittitle',
                    news_url    = '$editnews_url',
                    image       = '$upload_image'
                    WHERE  id   = '$id'";
        $update_row = $this->db->update($query);
        if ($update_row) {
         $msg = '<div class="alert alert-success" role="alert">
               Data updated Successfully!
             </div>';
           return $msg;
        }else{
          $msg = '<div class="alert alert-warning" role="alert">
               Data Not updated!
             </div>';
           return $msg;
        }
        }
       }else{

        if(!filter_var($editnews_url, FILTER_VALIDATE_URL)){
         $msg = '<div class="alert alert-danger" role="alert">
                  Invalid URL- https://www.exemple.com !
                 </div>';
              return $msg;
       }else{

        $query = "UPDATE populer_bangla_news
                    SET
                    name        = '$editnewsname',
                    title       = '$edittitle',
                    news_url    = '$editnews_url'
                    WHERE  id   = '$id'";
        $update_row = $this->db->update($query);
        if ($update_row) {
         $msg = '<div class="alert alert-success" role="alert">
               Data updated Successfully!
             </div>';
           return $msg;
        }else{
          $msg = '<div class="alert alert-warning" role="alert">
               Data Not updated!
             </div>';
           return $msg;
        }
         }
          }

           }

   }

/* Populer news Delete Query..Start... */

public function getDeletePopulerNews($id){

  $delSql = "SELECT * FROM populer_bangla_news WHERE id = '$id'";
  $delResult = $this->db->select($delSql);
  if ($delResult) {
     while ($delImage = $delResult->fetch_assoc()) {
            $delLink  = $delImage['image'];
             unlink($delLink);
     }
  }

  $sql = "DELETE FROM populer_bangla_news WHERE id = '$id'";
  $result = $this->db->delete($sql);
  if ($result) {
    $msg = '<div class="alert alert-success" role="alert">
               Data Deleted Successfully!
             </div>';
           return $msg;
  }else{
    $msg = '<div class="alert alert-warning" role="alert">
               Data is not Deleted!
             </div>';
           return $msg;
  }

}


/* Populer news Delete Query..End... */

}