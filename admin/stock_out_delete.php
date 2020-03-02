<?php 

include('../class/Controller.php');
$obj=new Controller();
$id=$_GET['id'];
$obj->del_stock_out($id);
header("Location: stock_out_list.php");
 
 ?>