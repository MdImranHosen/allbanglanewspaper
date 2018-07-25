<?php 

/**
* Category Class..
*/
class Category{
    private $db;
    private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
     #Category Insert query and validation...
	public function categoryAdd($data){
         $category = $data['category'];

         $category = $this->fm->validation($category);
         $category = mysqli_real_escape_string($this->db->link, $category);

         if (empty($category)) {
         	$msg = '<div class="alert alert-warning" role="alert">
                  Field must not be Empty!
                 </div>';
           return $msg;
         }else{
         	$checkfSql = "SELECT * FROM category WHERE category = '$category' LIMIT 1";
            $checkfResult = $this->db->select($checkfSql);
          if ($checkfResult != false) {
          	$msg = '<div class="alert alert-danger" role="alert" >
                 This Category Already Exist!
			</div>';
			return $msg;
          }else{

         	$sql = "INSERT INTO category(category) VALUES('$category')";
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
	  #Category Select query... 
	public function getCategoryData(){
		$sql = "SELECT * FROM category";
		$result = $this->db->select($sql);
		return $result;
	}
	#Category Delete query...
	public function getCategoryDelete($catId){
		$sql = "DELETE FROM category WHERE catId = '$catId'";
		$result = $this->db->delete($sql);
		if ($result) {
			$msg = '<div class="alert alert-success" role="alert">
			   Data Deleted Successfully!
			 </div>';
		   return $msg;
		}else{
			$msg = '<div class="alert alert-danger" role="alert" >
                 Data Not Deleted!
			</div>';
			return $msg;
		}
	}

	public function showUpdateCatResult($id){
		$sql = "SELECT * FROM category WHERE catId = '$id'";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getEditCategory($data, $id){
         
         $category = $this->fm->validation($data['category']);
         $category = mysqli_real_escape_string($this->db->link, $category);

         if (empty($category)) {
         	$msg = '<div class="alert alert-danger" role="alert" >
                 Field Must not be Empty!
			</div>';
			return $msg;
         }else{

          $checkSql = "SELECT * FROM category WHERE category = '$category' LIMIT 1";
          $checkResult = $this->db->select($checkSql);
          if ($checkSql != false) {
          	$msg = '<div class="alert alert-danger" role="alert" >
                 This Category Already Exist!
			</div>';
			return $msg;
          }else{

	         $sql = "UPDATE category
	                    SET
	                  category = '$category'
	                  WHERE catId = '$id'";
	         $result = $this->db->update($sql);
	         if ($result) {
	         	$msg = '<div class="alert alert-success" role="alert">
				   Data Updated Successfully!
				 </div>';
			   return $msg;
	         }else{
	         	$msg = '<div class="alert alert-danger" role="alert">
				   Data Not Updated!
				 </div>';
			   return $msg;
	         }
          }
       }
	}
	
}