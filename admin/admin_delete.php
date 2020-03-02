<?php 

include('../class/Controller.php');
$obj=new Controller();
$id=$_GET['id'];
$obj->del_admin($id);
header("Location:user.php");




 ?>