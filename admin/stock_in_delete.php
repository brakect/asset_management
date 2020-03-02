<?php 

include('../class/Controller.php');
$obj=new Controller();
$id=$_GET['id'];
$obj->del_stock_in($id);
header("Location: stock_in_list.php");
 
 ?>