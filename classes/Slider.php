<?php 
/**
 * Slider manage
 */
class Slider{
	public function getSliderImage($file){
		$imgname = $file['slider_img']['name'];
		$imgsize = $file['slider_img']['size'];
        $imgtemp = $file['slider_img']['tmp_name'];
		$upimage = '../images/slider/'.$img;

		move_uploaded_file($imgtemp, $upimage);

	}
	
}
