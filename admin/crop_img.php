<?php

/* Get Post Details */
$post = isset($_POST) ? $_POST: array();
switch ($post['action']) {
	case 'save':
		saveSliderImage();
		seveSliderImageTmp();
		break;
	
	default:
		addSliderImage();
		break;
}

function addSliderImage(){
	$post = isset($_POST) ? $_POST: array();
	$max_width = "570";
	$sliderId = isset($post['hdn-slider-id']) ? intval($post['hdn-slider-id']) : 0;
	$path = 'images/slider/';
	$valid_formats = array("jpg","png","gif","jpeg");
	$name = $_FILES['slider_images']['name'];
	$size = $_FILES['slider_images']['size'];
	$tmp  = $_FILES['slider_images']['tmp_name'];
	if (strlen($name)) {
	 list($txt, $ext) = explode(".", $name);

	 if (in_array($ext, $valid_formats)) {
	 	if ($size<(1024*1024)) {
	 		$actual_image_name = substr(md5(time()), 0, 10).'.'.$ext;
	 		$filePath = $path.$actual_image_name;
	 		if (move_uploaded_file($tmp, $filePath)) {
	 			$width = getWidth($filePath);
	 			$height = getHeight($filePath);
	 			//Scale the image if it is greater than the width set above
	 			if ($width > $max_width) {
	 				$scale = $max_width/$width;
	 				$uploaded = resizeImage($filePath,$width,$height,$scale, $ext);
	 			}else{
	 				$scale = 1;
	 				$uploaded = resizeImage($filePath,$width,$height,$scale, $ext);
	 			}
	 		 echo "<img id='photo' file-name='".$actual_image_name."' class='' src='".$filePath.'?'.time()."' class='preview' />";
	 		}
	 		else 
	 			echo "Failed";
	 	}
	 	else
	 		echo "Image file size max 1 MB";
	 }
	 else
	 	echo "Invalid file Format..";
	}
	else
	echo "Please Select image..";
	exit();
}
/* Function to handle save profile pic */
function saveSliderImage(){
	include "../lib/Database.php";
    $db = new Database();
	$post = isset($_POST) ? $_POST: array();
	/* Handle profile picture update with MySQL update Query using $options array */
	if ($post['id']) {
		$id = $post['id'];
		$id = mysqli_real_escape_string($db->link, $id);
		$sql_query = "SELECT * FROM slider_img WHERE id = '$id'";
		$results = $db->select($sql_query);
		if (mysqli_num_rows($results)) {
			$image_name = mysqli_real_escape_string($db->link, $post['image_name']);
			$sql_update = "UPDATE slider_img SET
			                  slider_image = '$image_name'
			                  WHERE id = '$id'";
			$uresult = $db->update($sql_update);
		}
	}
}
	/* Function to update image */
	function seveSliderImageTmp(){
		$post = isset($_POST) ? $_POST: array();
		$sliderId = isset($_POST['id']) ? intval($post['id']) : 0;
		$path = '\\images\slider';
		$t_width = 600; //Maximum thumbnail width
		$t_height = 300; //Maximum thumbnail height
		if (isset($_POST['t']) and $_POST['t'] == "ajax") {
			extract($_POST);
			$imagePath = 'images/slider/'.$_POST['image_name'];
			$ratio = ($t_width/$w1);
			$nw = ceil($w1 * $ratio);
			$nh = ceil($h1 * $ratio);
			$nimg = imagecreatetruecolor($nw, $nh);
			$im_src = imagecreatefromjpeg($imagePath);
			imagecopyresampled($nimg, $im_src, 0, 0, $x1, $y1, $nw, $nh, $w1, $h1);
			imagejpeg($nimg,$imagePath,90);
		}
		echo $imagePath.'?'.time();
		exit(0);
	}
 /* Function to resize image */
 function resizeImage($image,$width,$height,$scale,$ext){
    $newImageWidth = ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
    switch ($ext) {
    	case 'jpg':
    	case 'jpeg':
    		$source = imagecreatefromjpeg($image);
    		break;
    	case 'gif':
    		$source = imagecreatefromgif($image);
    		break;
    	case 'png':
    		$source = imagecreatefrompng($image);
    		break;
    	
    	default:
    		$source = false;
    		break;
    }
    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
    imagejpeg($newImage,$image,90);
    chmod($image, 0777);
    return $image;
 }
 /* Function to get image height */
 function getHeight($image){
   $sizes = getimagesize($image);
   $height = $sizes[1];
   return $height;
 }
 /* Function to get image width */
 function getWidth($image){
 	$sizes = getimagesize($image);
 	$width = $sizes[0];
 	return $width;
 }
