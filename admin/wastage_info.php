<?php

require('head_c.php');
$_SESSION['menu']='reports';

$p=$obj->getData('product','id='.$_GET['id'])->fetch(PDO::FETCH_ASSOC); 
$data=$obj->getData('wastage','product_id='.$_GET['id']); 
// SELECT * FROM `wastage` WHERE product_id=

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
        Wastage Product info
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="wastage_info.php">Wastage Product info</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="wastage_report_out.php" method="post">
              <div class="col-xs-12 col-md-12">
                <table class="table table-bordered">
                  <thead>
                    <tr class="bg-primary">
                      <th>SL</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total value</th>
                      <th>Wastage Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; while ( $d=$data->fetch(PDO::FETCH_ASSOC)) { ++$i; ?>
                      <tr>   
                        <td><?php echo $i ?></td>
                        <td><?php echo $p['name'] ?></td>
                        <td><?php echo $d['quantity']; ?></td>
                        <td><?php echo number_format($p['price'],2); ?></td>
                        <td class="text-right"><?php echo number_format($t=$d['quantity']*$p['price'],2); ?></td>
                        <td class="text-right"><?php echo $d['date']; ?></td>
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
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  
  </script>
<!-- ./wrapper -->
<?php require('footer_c.php');?>

