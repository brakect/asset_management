<?php 

include('../class/Controller.php');
$obj=new Controller();
$i=$_POST['id'];
$p=$_POST['password'];


if(isset($_POST['id'])){
 $obj->db->query("UPDATE `admin` SET `password`='".$p."' WHERE `id`=".$i);
 header("Location: admin_password.php");


}




 ?>