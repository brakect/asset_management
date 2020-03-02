<?php 

include('../class/Controller.php');
$obj=new Controller();
$id=$_GET['id'];
$obj->del_wastage($id);
header("Location:wastage_list.php"); 

 ?>