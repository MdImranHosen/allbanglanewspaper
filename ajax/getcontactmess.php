<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../classes/Contact.php');
$con_us = new Contact();

  $name    = $_POST['name'];
  $email   = $_POST['email'];
  $phone   = $_POST['phone'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $get_message_user = $con_us->getMessageFromUser($name, $email, $phone, $subject, $message);

  //Insert Contact us data with ajax