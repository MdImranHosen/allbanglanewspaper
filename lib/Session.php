<?php
/**
*Session Class
**/
class Session{
 public static function init(){
  if (version_compare(phpversion(), '5.4.0', '<')) {
        if (session_id() == '') {
            session_start();
        }
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
 }

 public static function set($key, $val){
  $_SESSION[$key] = $val;
 }

 public static function get($key){
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
  } else {
   return false;
  }
 }

 public static function checkSession(){
  self::init();
  if (self::get("login")== false) {
   self::destroy();
   header("Location:login.php");
  }
 }

 public static function checkLogin(){
  self::init();
  if (self::get("login")== true) {
   header("Location:index.php");
  }
 }

 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }

 /* User Comment system Session start */

 public static function checkUserSession(){
  self::init();
  if (self::get("user_login")== false) {
    self::user_session_destroy();
    header("Location:user-login.php");
  }
 }

  public static function userLogin(){
  self::init();
  if (self::get("user_login")== true) {
   header("Location:index.php");
  }
 }

 public static function user_session_destroy(){
  session_destroy();
  session_unset();
  header("Location:index.php");
 }

}
?>
