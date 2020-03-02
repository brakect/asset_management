<?php

require('head_c.php');
$_SESSION['menu']='product';

$data=$obj->getData('stock_in',1);
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
       Stock in List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="stock_in_list.php"> Stock in List </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form>
              <div class="col-xs-12 col-md-12">
                <table id="example1" class="table table-bordered">
                  <thead class="bg-primary">
                    <tr>
                      <th>SL</th>
                      <th>Invoice NO</th>
                      <th>Admin</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Sub-Total</th>
                      <th>Discount</th>
                      <th>Total</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
<?php $i=0; while ( $d=$data->fetch(PDO::FETCH_ASSOC)) { ++$i; 
$p=$obj->getData('product','id='.$d['product_id'])->fetch(PDO::FETCH_ASSOC);
$a=$obj->getData('admin','id='.$d['admin_id'])->fetch(PDO::FETCH_ASSOC);
                      ?>
                      <tr>   
                        <th class="text-right"><?php echo $i ?></th>
                        <th class="text-right"><?php echo $d['invoice_no']; ?></th>
                        <th><?php echo $a['name'] ?></th>
                        <th><?php echo $p['name']; ?></th>
                        <th class="text-right"><?php echo number_format($p['price'],2); ?></th>
                        <th class="text-right"><?php echo $d['quantity']; ?></th>
                        <th class="text-right"><?php echo number_format($d['sub_total'],2); ?></th>
                        <th class="text-right"><?php echo $d['discount']; ?></th>
                        <th class="text-right"><?php echo number_format($d['total'],2); ?></th>
                        <th><?php echo $d['date']; ?></th>
                        <th>
                          <a href="stock_in_delete.php?id=<?php echo $d['id'] ?>" class="btn btn-danger">Delete</a> <a href="stock_in_edit.php?id=<?php echo $d['id'] ?> "class="btn btn-primary">Edit</a>
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

