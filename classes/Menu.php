<?php
/**
* Menu Class...
*/
class Menu{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

/*	public function getAddMenu($data){
      $name    = $data['name'];
      $tbl_url = $data['tbl_url'];
      $menu_id = $data['menu_id'];

      $name    = $this->fm->validation($name);
      $tbl_url = $this->fm->validation($tbl_url);

      $name    = mysqli_real_escape_string($this->db->link, $name);

      if (empty($name) || empty($tbl_url)) {
      	    $msg = '<div class="alert alert-warning" role="alert">
                  Field must not be Empty!
                 </div>';
           return $msg;
      }else{
      	$sql = "INSERT INTO tbl_menu(name, tbl_url, menu_id) VALUES('$name','$tbl_url','$menu_id')";
      	$result = $this->db->insert($sql);
      	if ($result) {
      		$msg = '<div class="alert alert-success" role="alert">
                  $name Inserted Successfully!
                 </div>';
           return $msg;
      	}else{
      		$msg = '<div class="alert alert-danger" role="alert">
                  New Menu Not Inserted!
                 </div>';
           return $msg;
      	}
      }
	} */

	public function getMenuSelect(){
		$sql = "SELECT * FROM tbl_menu";
		$result = $this->db->select($sql);
		return $result;
	}
  public function getDeleteMenu($id){
      $sql = "DELETE FROM tbl_menu WHERE id = '$id'";
      $result = $this->db->delete($sql);
      if ($result){
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
  public function getAddSubMenu($data, $id){
    $subname     = $data['subname'];
    $submenu_url = $data['submenu_url'];

    $subname     = $this->fm->validation($subname);
    $submenu_url = $this->fm->validation($submenu_url);

    $subname     = mysqli_real_escape_string($this->db->link, $subname);

    if (empty($subname) || empty($submenu_url)) {
      $msg = '<div class="alert alert-danger" role="alert">
           Field Must not be Empty!
         </div>';
         return $msg;
    }else{
      $sql = "INSERT INTO tbl_menu(name,tbl_url,menu_id) VALUES('$subname','$submenu_url','$id')";
      $result = $this->db->insert($sql);
      if ($result) {
        $msg = '<div class="alert alert-success" role="alert" >
         Data Inserted Successfully!
        </div>';
        return $msg;
      }
    }

  }
    #Update Menu show table data ...Query..
   public function showUpdateMenuResult($id){
    $sql = "SELECT * FROM tbl_menu WHERE id = '$id'";
    $result = $this->db->select($sql);
    return $result;
   }

   # Update Menu Show table data ...Query...

   public function getEditSubMenu($data, $id){
      $subname     = $data['subname'];
      $submenu_url = $data['submenu_url'];

      $subname     = $this->fm->validation($subname);
      $submenu_url = $this->fm->validation($submenu_url);

      $subname     = mysqli_real_escape_string($this->db->link, $subname);

      if (empty($subname) || empty($submenu_url)) {
        $msg = '<div class="alert alert-danger" role="alert">
         Field must not be Empty!
         </div>';
         return $msg;
      }else{
        $sql = "UPDATE tbl_menu
                SET 
            name    = '$subname',
            tbl_url = '$submenu_url'
            WHERE id = '$id'";
          $upResult = $this->db->update($sql);
          if ($upResult) {
            $msg = '<div class="alert alert-success" role="alert">
              Menu Data Updated Successfully!
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

     public  function dispaly_menus(){
          $sql = "SELECT * FROM tbl_menu ORDER BY menu_id ASC";
          $result = $this->db->select($sql);
          return $result; 
        }
      public function loop_array($array = array(), $menu_id = 0){
        if (!empty($array[$menu_id])) {
           return $array[$menu_id];
        }
      }

     public function getMenuRowResult($menu_id){
         $sql = "SELECT * FROM tbl_menu WHERE id = '$menu_id'";
         $resultOneRow = $this->db->select($sql);
         return $resultOneRow;
     }

     public function getAddMenuRegister($addmenuname, $addmenu_url, $menu_id_add){
          $addmenuname  = $this->fm->validation($addmenuname);
          $addmenu_url  = $this->fm->validation($addmenu_url);
          $menu_id_add  = $this->fm->validation($menu_id_add);
          
          $addmenuname  = mysqli_real_escape_string($this->db->link, $addmenuname);
          $addmenu_url  = mysqli_real_escape_string($this->db->link, $addmenu_url);
          $menu_id_add  = mysqli_real_escape_string($this->db->link, $menu_id_add);
          
          if ($addmenuname == "" || $addmenu_url == "") {
            echo '<div class="alert alert-danger" role="alert">
               Field must not be Empty!
            </div>';
              exit();
          }else{
             $sql = "INSERT INTO tbl_menu(name,tbl_url,menu_id) VALUES('$addmenuname','$addmenu_url','$menu_id_add')";
             $insertResult = $this->db->insert($sql);
             if ($insertResult) {
               echo '<div class="alert alert-success" role="alert">
               Menu Data Inserted Successfully!
               </div>';
               exit();
             }else{
                 echo '<div class="alert alert-danger" role="alert">
                    Menu Data not Inserted!
                   </div>';
                exit();
             }
          }
     }

}