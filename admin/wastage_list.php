<?php

require('head_c.php');
$_SESSION['menu']='product';

$data=$obj->getData('wastage',1);
?>
<div class="wrapper">
  <?php
  require('leftMenu.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Wastage List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="wastage_list.php"> Wastage List </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form>
              <div class="col-xs-12 col-md-12">
                <table class="table table-bordered">
                  <thead class="bg-primary">
                    <tr>
                      <th>SL</th>
                      <th>Date</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
<?php $i=0; while ( $d=$data->fetch(PDO::FETCH_ASSOC)) { ++$i;
$p=$obj->getData('product','id='.$d['product_id'])->fetch(PDO::FETCH_ASSOC);
                     ?>
                      <tr>   
                        <th class="text-right"><?php echo $i ?></th>
                        <th><?php echo $d['date']; ?></th>
                        <th><?php echo $p['name']; ?></th>
                        <th class="text-right"><?php echo number_format($p['price'],2); ?></th>
                        <th class="text-right"><?php echo $d['quantity']; ?></th>
                        <th class="text-right"><?php echo number_format($d['total'],2); ?></th>
                        <th>
                         <a href="wastage_delete.php?id=<?php echo $d['id'] ?>" class="btn btn-danger">Delete</a> <a href="wastage_edit.php?id=<?php echo $d['id'] ?> "class="btn btn-primary">Edit</a>
                        </th>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </form>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
</div>
<!-- ./wrapper -->
<?php require('footer_c.php');?>

