<?php
$vis_co = new Visitor();
//Unique visitor counter..
 if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }

 $successinsert = $vis_co->getVisitorCounter($ip);



//Visitor counter user details ....
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  
 if (!empty($actual_link)) {
 	$pageurl = $actual_link;
 }
 $datetime = date("Y-m-d H:i:s");
 $vis_co->getVisitorDetails($pageurl,$ip,$datetime);

 ?>