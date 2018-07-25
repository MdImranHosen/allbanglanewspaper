<?php
/**
 * Socail Media Manage for Socail class useing...
 */
class Socail{
	private $db;
	private $fm;
	public function __construct()
	{
     $this->db = new Database();
     $this->fm = new Format();
	}
	public function getSocailMediaByIdShow(){
		$sql = "SELECT * FROM bd_socail ORDER BY so_id LIMIT 1";
		$result = $this->db->select($sql);
		return $result;
	}
	public function socaiilMediaUrl($data){
     if (empty($data['bn_ns_fb']) || empty($data['bn_ns_tw']) || empty($data['bn_ns_gp']) || empty($data['bn_ns_lk']) || empty($data['bn_ns_ig']) || empty($data['bn_ns_ps']) || empty($data['bn_ns_yt'])) {
    $msg = '<div class="alert alert-danger">Field Must Not Be Empty!</div>';
    return $msg;
     }else{
     	$so_id    = $this->fm->validation($data['so_id']);
     	$bn_ns_fb = $this->fm->validation($data['bn_ns_fb']);
     	$bn_ns_tw = $this->fm->validation($data['bn_ns_tw']);
     	$bn_ns_gp = $this->fm->validation($data['bn_ns_gp']);
     	$bn_ns_lk = $this->fm->validation($data['bn_ns_lk']);
     	$bn_ns_ig = $this->fm->validation($data['bn_ns_ig']);
     	$bn_ns_ps = $this->fm->validation($data['bn_ns_ps']);
     	$bn_ns_yt = $this->fm->validation($data['bn_ns_yt']);

     	$so_id    = mysqli_real_escape_string($this->db->link,$so_id);
     	$bn_ns_fb = mysqli_real_escape_string($this->db->link,$bn_ns_fb);
     	$bn_ns_tw = mysqli_real_escape_string($this->db->link,$bn_ns_tw);
     	$bn_ns_gp = mysqli_real_escape_string($this->db->link,$bn_ns_gp);
     	$bn_ns_lk = mysqli_real_escape_string($this->db->link,$bn_ns_lk);
     	$bn_ns_ig = mysqli_real_escape_string($this->db->link,$bn_ns_ig);
     	$bn_ns_ps = mysqli_real_escape_string($this->db->link,$bn_ns_ps);
     	$bn_ns_yt = mysqli_real_escape_string($this->db->link,$bn_ns_yt);

     	if (!filter_var($bn_ns_fb, FILTER_VALIDATE_URL) !== false) {
     		$msg = '<div class="alert alert-danger">Facebook Invalid URL</div>';
     		return $msg;
     	}elseif (!filter_var($bn_ns_tw, FILTER_VALIDATE_URL) !== false) {
     		$msg = '<div class="alert alert-danger">Twitter Invalid URL.</div>';
     		return $msg;
     	}elseif (!filter_var($bn_ns_gp, FILTER_VALIDATE_URL) !== false) {
     		$msg = '<div class="alert alert-danger">Google Plus Invalid URL</div>';
     	}elseif (!filter_var($bn_ns_lk, FILTER_VALIDATE_URL) !== false) {
     		$msg = '<div class="alert alert-danger">Linkedin Invalid URL</div>';
     	}elseif (!filter_var($bn_ns_ig, FILTER_VALIDATE_URL) !== false) {
     		$msg = '<div class="alert alert-danger">Instagram Invalid URL</div>';
     	}elseif (!filter_var($bn_ns_ps, FILTER_VALIDATE_URL) !== false) {
     		$msg = '<div class="alert alert-danger">Pinterest Invalid URL</div>';
     	}elseif (!filter_var($bn_ns_yt, FILTER_VALIDATE_URL) !== false) {
     		$msg = '<div class="alert alert-danger">Youtube Invalid URL</div>';
     	}else{
     		$sqlCheck = "SELECT * FROM bd_socail WHERE bn_ns_fb = '$bn_ns_fb' && bn_ns_tw ='$bn_ns_tw' && bn_ns_gp = '$bn_ns_gp' && bn_ns_lk = '$bn_ns_lk' && bn_ns_ig= '$bn_ns_ig' && bn_ns_ps = '$bn_ns_ps' && bn_ns_yt = '$bn_ns_yt' && so_id = '$so_id'";
     		$checkResult = $this->db->select($sqlCheck);
     		if ($checkResult != false) {
     			$msg = '<div class="alert alert-danger">Socail Media URL is not Change.</div>';
     			return $msg;
     		}else{
              $update = "UPDATE bd_socail SET 
                                bn_ns_fb = '$bn_ns_fb',
                                bn_ns_tw = '$bn_ns_tw',
                                bn_ns_gp = '$bn_ns_gp',
                                bn_ns_lk = '$bn_ns_lk',
                                bn_ns_ig = '$bn_ns_ig',
                                bn_ns_ps = '$bn_ns_ps',
                                bn_ns_yt = '$bn_ns_yt'
                                WHERE so_id = '$so_id'";
               $result = $this->db->update($update);
               if ($result) {
               	$msg = '<div class="alert alert-success">Socail Media Data Update Successfully!</div>';
               	return $msg;
               }else{
               	$msg = '<div class="alert alert-danger">Something Wrong</div>';
               }
     		}
     	}
     }
	}
}