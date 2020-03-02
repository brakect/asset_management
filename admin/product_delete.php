<?php 

include('../class/Controller.php');
$obj=new Controller();
$id=$_GET['id'];
$obj->del_product($id);
header("Location:product_list.php");
 
 ?>