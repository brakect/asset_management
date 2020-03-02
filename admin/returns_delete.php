<?php 

include('../class/Controller.php');
$obj=new Controller();
$id=$_GET['id'];
$obj->del_returns($id);
header("Location:returns_list.php"); 

 ?>