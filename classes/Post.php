<?php
/**
* Post Class....
*/
class Post{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getNewsPostInsert($data, $file){

	 if (empty($data['newsTitle']) || empty($data['c_date']) || empty($data['details_news']) ) {
       $msg = '<div class="alert alert-warning" role="alert">
                  Field must not be Empty!
                 </div>';
              return $msg;
	 }else{

        $newsTitle    = $this->fm->validation($data['newsTitle']);
        $titleColor   = $this->fm->validation($data['titleColor']);
        $catId        = $this->fm->validation($data['catId']);
        $c_date       = $this->fm->validation($data['c_date']);
        $details_news = $this->fm->validationText($data['details_news']);
        $optradio     = $this->fm->validation($data['optradio']);
        $s_tag        = $this->fm->validation($data['s_tag']);


        $newsTitle    = mysqli_real_escape_string($this->db->link, $newsTitle);
        $titleColor   = mysqli_real_escape_string($this->db->link, $titleColor);
        $c_date       = mysqli_real_escape_string($this->db->link, $c_date);
        $details_news = mysqli_real_escape_string($this->db->link, $details_news);
        $optradio     = mysqli_real_escape_string($this->db->link, $optradio);
        $s_tag        = mysqli_real_escape_string($this->db->link, $s_tag);


        $permitted    = array('png', 'jpg', 'jpeg', 'gif');
        $file_name    = $file['newsImage']['name'];
        $file_size    = $file['newsImage']['size'];
        $file_temp    = $file['newsImage']['tmp_name'];

        $div          = explode('.', $file_name);
        $image_ext    = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$image_ext;
        $upload_image = "upload/post/".$unique_image;
        
        #extra image input query....start.....

        $permitt      = array('png', 'jpg', 'jpeg', 'gif');
        $file_na_e    = $file['extraImage']['name'];
        $file_s_e     = $file['extraImage']['size'];
        $file_tm_e    = $file['extraImage']['tmp_name'];

        $div_e        = explode('.', $file_na_e);
        $file_ext     = strtolower(end($div_e));
        $unique_file  = substr(md5(date('Y-m-d-H-i-s')), 0, 10).'.'.$file_ext;
        $upload_file  = "upload/post/".$unique_file;

       #extra image input query....end.....
        if (!empty($file_na_e)) {
        	
        	if($file_s_e > 2097152){
         $msg = '<div class="alert alert-danger" role="alert">
               Image Size Should be less then 2 MB !
             </div>';
           return $msg;
		  }elseif(in_array($file_ext, $permitt) === false){
	        $msg = '<div class="alert alert-danger" role="alert">
	                 You can uploads only:-'.implode(', ', $permitt).'</div>';
	              return $msg;
		  }
        }

       if(empty($file_name)){
        $msg = '<div class="alert alert-warning" role="alert">
                  অবশ্যই ছবির ফিল্ড টি পূরণ  করতে হবে !
                 </div>';
              return $msg;
       }elseif($file_size > 2097152){
         $msg = '<div class="alert alert-danger" role="alert">
               Image Size Should be less then 2 MB !
             </div>';
           return $msg;
	  }elseif(in_array($image_ext, $permitted) === false){
        $msg = '<div class="alert alert-danger" role="alert">
                 You can uploads only:-'.implode(', ', $permitted).'</div>';
              return $msg;
	  }else{
	  	move_uploaded_file($file_temp, $upload_image);
	  	move_uploaded_file($file_tm_e, $upload_file);
	  	$sql = "INSERT INTO tbl_news_post(newsTitle,titleColor,catId,c_date,newsImage,details_news,optradio,extraImage,s_tag) VALUES('$newsTitle','$titleColor','$catId','$c_date','$upload_image','$details_news','$optradio','$upload_file','$s_tag')";
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


	public function getNews_list(){
		$sql = "SELECT n.*, c.category FROM tbl_news_post AS n, category AS c WHERE n.catId = c.catId ORDER BY n.id DESC";
		$result = $this->db->select($sql);
		return $result;
	}

	public function newsListToDelete($id){
		$sql = "DELETE FROM tbl_news_post WHERE id = '$id'";
		$result = $this->db->delete($sql);
		if ($result) {
	  		$msg = '<div class="alert alert-success" role="alert">
               Data Deleted Successfully!
             </div>';
           return $msg;
	  	}else{
          $msg = '<div class="alert alert-danger" role="alert">
               Data Not Deleted!
             </div>';
           return $msg;
	  	}
	}

	public function getNewsResultall($id){
		$sql = "SELECT * FROM tbl_news_post WHERE id = '$id'";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getNewsPostUpdate($data, $file, $id){

		    $editnewsTitle     = $this->fm->validation($data['editnewsTitle']);
        $edittitleColor    = $this->fm->validation($data['edittitleColor']);
        $editCatId         = $this->fm->validation($data['editCatId']);
        $edit_date         = $this->fm->validation($data['edit_date']);
        $edit_details_news = $this->fm->validationText($data['edit_details_news']);
        $edit_optradio     = $this->fm->validation($data['edit_optradio']);
        $edit_tag          = $this->fm->validation($data['edit_tag']);


        $editnewsTitle     = mysqli_real_escape_string($this->db->link, $editnewsTitle);
        $edittitleColor    = mysqli_real_escape_string($this->db->link, $edittitleColor);
        $editCatId         = mysqli_real_escape_string($this->db->link, $editCatId);
        $edit_date         = mysqli_real_escape_string($this->db->link, $edit_date);
        $edit_details_news = mysqli_real_escape_string($this->db->link, $edit_details_news);
        $edit_optradio     = mysqli_real_escape_string($this->db->link, $edit_optradio);
        $edit_tag          = mysqli_real_escape_string($this->db->link, $edit_tag);


        $permitted    = array('png', 'jpg', 'jpeg', 'gif');
        $file_name    = $file['editnewsImage']['name'];
        $file_size    = $file['editnewsImage']['size'];
        $file_temp    = $file['editnewsImage']['tmp_name'];

        $div          = explode('.', $file_name);
        $image_ext    = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$image_ext;
        $upload_image = "upload/post/".$unique_image;
        
        #extra image input query....start.....

    if(!empty($file_name)){

     if($file_size > 2097152){
         $msg = '<div class="alert alert-danger" role="alert">
               Image Size Should be less then 2 MB !
             </div>';
           return $msg;
	  }elseif(in_array($image_ext, $permitted) === false){
        $msg = '<div class="alert alert-danger" role="alert">
                 You can uploads only:-'.implode(', ', $permitted).'</div>';
              return $msg;
	  }else{
	  	move_uploaded_file($file_temp, $upload_image);

	  	$sqlUpdate = "UPDATE tbl_news_post 
	  	                       SET 
                           newsTitle    = '$editnewsTitle',
                           titleColor   = '$edittitleColor',
                           catId        = '$editCatId',
                           c_date       = '$edit_date',
                           newsImage    = '$upload_image',
                           details_news = '$edit_details_news',
                           optradio     = '$edit_optradio',
                           s_tag        = '$edit_tag'
                               WHERE id = '$id'";

	  	$result = $this->db->update($sqlUpdate);
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
	 }else{

	  	$sqlUpdate = "UPDATE tbl_news_post 
	  	                       SET 
                           newsTitle    = '$editnewsTitle',
                           titleColor   = '$edittitleColor',
                           catId        = '$editCatId',
                           c_date       = '$edit_date',
                           details_news = '$edit_details_news',
                           optradio     = '$edit_optradio',
                           s_tag        = '$edit_tag'
                               WHERE id = '$id'";

	  	$result = $this->db->update($sqlUpdate);
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