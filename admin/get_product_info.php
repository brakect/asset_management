<?php
include('../class/Controller.php');
$obj=new Controller();
$info=$obj->getData('product', 'id='.$_POST['productID'])->fetch(PDO::FETCH_ASSOC);

echo json_encode($info);
?>