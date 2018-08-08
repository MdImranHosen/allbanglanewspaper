<?php
/**
* Format class
*/
class Format{

public function textShorten($text, $limit = 400){
  $text = $text. " ";
  $text = substr($text, 0, $limit);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text.".....";
  return $text;
 }

 public function textMqShorten($text, $limit = 60){
  $text = $text. " ";
  $text = substr($text, 0, $limit);
  $text = substr($text, 0, strrpos($text, ' '));
  $text = $text."...";
  return $text;
 }

public function validation($data){
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }

 public function FormatDate($date){
    return date('F j, Y, g:i a', strtotime($date));

  }

 public function validationText($data){
  $data = trim($data);
  $data = stripcslashes($data);
  #$data = htmlspecialchars($data);
  return $data;
 }
 public function title(){
  $path = $_SERVER['SCRIPT_FILENAME'];
  $title = basename($path,'.php');
  if ($title == 'index') {
    echo "Bangla Newspaper List";
  }elseif($title == 'tv'){
    echo "Bangla Tevelvision List";
  }elseif($title == 'radio'){
    echo "Bangla Radio List";
  }elseif($title == ''){
    echo "Bangla All Newspaper";
  }elseif($title == 'contact'){
    echo "Contact Us";
  }elseif($title == 'bangladeshi-community'){
    echo "Bangladeshi Community List";
  }
  return $title = ucwords($title);
 }

}