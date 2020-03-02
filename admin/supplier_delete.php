<?php 

include('../class/Controller.php');
$obj=new Controller();
$id=$_GET['id'];
$obj->del_supplier($id);
header("Location:supplier_list.php");
 
 ?>