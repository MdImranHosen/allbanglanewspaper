<?php 
include "../lib/Database.php";
include "../helpers/Format.php";
include "../classes/Menu.php";
//Insert Add Menu...Start.. Query..
$menu    = new Menu();
      	
	$addmenuname = $_POST['addmenuname'];
	$addmenu_url = $_POST['addmenu_url'];
	$menu_id_add = $_POST['menu_id_add'];

	$getAddMenu  = $menu->getAddMenuRegister($addmenuname, $addmenu_url, $menu_id_add);

 //Insert Add Menu ...End ...