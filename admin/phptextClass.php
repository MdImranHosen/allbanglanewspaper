<?php
/*phptext class, version 1.0
created by www.w3schools.in (Gautam kumar)
April 26, 2014
*/
class phptextClass
{	
	public function phptext($text,$textColor,$backgroundColor='',$fontSize,$imgWidth,$imgHeight,$dir,$fileName)
	{
		/* settings */
		$font = './calibri.ttf';/*define font*/
		$textColor=$this->hexToRGB($textColor);	
		
		$im = imagecreatetruecolor($imgWidth, $imgHeight);	
		$textColor = imagecolorallocate($im, $textColor['r'],$textColor['g'],$textColor['b']);	
		
		if($backgroundColor==''){/*select random color*/
			$colorCode=array('#56aad8', '#61c4a8', '#d3ab92');
			$backgroundColor = $this->hexToRGB($colorCode[rand(0, count($colorCode)-1)]);
			$backgroundColor = imagecolorallocate($im, $backgroundColor['r'],$backgroundColor['g'],$backgroundColor['b']);
		}else{/*select background color as provided*/
			$backgroundColor = $this->hexToRGB($backgroundColor);
			$backgroundColor = imagecolorallocate($im, $backgroundColor['r'],$backgroundColor['g'],$backgroundColor['b']);
		}
		
		imagefill($im,0,0,$backgroundColor);	
		list($x, $y) = $this->ImageTTFCenter($im, $text, $font, $fontSize);	
		imagettftext($im, $fontSize, 0, $x, $y, $textColor, $font, $text);
		if(imagejpeg($im,$dir.$fileName,90)){/*save image as JPG*/
			return json_encode(array('status'=>TRUE,'image'=>$dir.$fileName));
		imagedestroy($im);	
		}
	}	
	
	public function phpcaptcha($textColor,$backgroundColor,$imgWidth,$imgHeight,$noiceLines=0,$noiceDots=0,$noiceColor='#162453')
	{	
		/* Settings */
		$text=$this->random();
		$font = './font/monofont.ttf';/* font */
		$textColor=$this->hexToRGB($textColor);	
		$fontSize = $imgHeight * 0.75;
		
		$im = imagecreatetruecolor($imgWidth, $imgHeight);	
		$textColor = imagecolorallocate($im, $textColor['r'],$textColor['g'],$textColor['b']);			
		
		$backgroundColor = $this->hexToRGB($backgroundColor);
		$backgroundColor = imagecolorallocate($im, $backgroundColor['r'],$backgroundColor['g'],$backgroundColor['b']);
				
		/* generating lines randomly in background of image */
		if($noiceLines>0){
		$noiceColor=$this->hexToRGB($noiceColor);	
		$noiceColor = imagecolorallocate($im, $noiceColor['r'],$noiceColor['g'],$noiceColor['b']);
		for( $i=0; $i<$noiceLines; $i++ ) {				
			imageline($im, mt_rand(0,$imgWidth), mt_rand(0,$imgHeight),
			mt_rand(0,$imgWidth), mt_rand(0,$imgHeight), $noiceColor);
		}}				
				
		if($noiceDots>0){/* generating the dots randomly in background */
		for( $i=0; $i<$noiceDots; $i++ ) {
			imagefilledellipse($im, mt_rand(0,$imgWidth),
			mt_rand(0,$imgHeight), 3, 3, $textColor);
		}}		
		
		imagefill($im,0,0,$backgroundColor);	
		list($x, $y) = $this->ImageTTFCenter($im, $text, $font, $fontSize);	
		imagettftext($im, $fontSize, 0, $x, $y, $textColor, $font, $text);		

		imagejpeg($im,NULL,90);/* Showing image */
		header('Content-Type: image/jpeg');/* defining the image type to be shown in browser widow */
		imagedestroy($im);/* Destroying image instance */
		if(isset($_SESSION)){
			$_SESSION['captcha_code'] = $text;/* set random text in session for captcha validation*/
		}
	}
	
	/*for random string*/
	protected function random($characters=6,$letters = '23456789bcdfghjkmnpqrstvwxyz'){
		$str='';
		for ($i=0; $i<$characters; $i++) { 
			$str .= substr($letters, mt_rand(0, strlen($letters)-1), 1);
		}
		return $str;
	}	
	
	/*function to convert hex value to rgb array*/
	protected function hexToRGB($colour)
	{
			if ( $colour[0] == '#' ) {
					$colour = substr( $colour, 1 );
			}
			if ( strlen( $colour ) == 6 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
			} elseif ( strlen( $colour ) == 3 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
			} else {
					return false;
			}
			$r = hexdec( $r );
			$g = hexdec( $g );
			$b = hexdec( $b );
			return array( 'r' => $r, 'g' => $g, 'b' => $b );
	}		
		
	/*function to get center position on image*/
	protected function ImageTTFCenter($image, $text, $font, $size, $angle = 8) 
	{
		$xi = imagesx($image);
		$yi = imagesy($image);
		$box = imagettfbbox($size, $angle, $font, $text);
		$xr = abs(max($box[2], $box[4]));
		$yr = abs(max($box[5], $box[7]));
		$x = intval(($xi - $xr) / 2);
		$y = intval(($yi + $yr) / 2);
		return array($x, $y);	
	}
}
?>