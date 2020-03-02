<?php 

include('../class/Controller.php');
$obj=new Controller();


if(isset($_POST['name'])){
 $obj->update_admin_photos($_POST);


}




 ?>