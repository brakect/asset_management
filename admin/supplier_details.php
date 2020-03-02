<?php

require('head_c.php');
$_SESSION['menu']='reports';

$data=$obj->getData('stock_in','supplier_id='.$_GET['id']);



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
        Supplier details
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="supplier_report.php">Supplier Report </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="supplier_report_out.php" method="post">
              <div class="col-xs-12 col-md-12">
                <table class="table table-bordered">
                  <thead>
                    <tr class="bg-primary">
                      <th>SL</th>
                      <th>Products Name</th>
                      <th>Quantity</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0;
                    while( $stk=$data->fetch(PDO::FETCH_ASSOC)){ ++$i;
                      
                     $pro=$obj->db->query("select * from product where id=".$stk['product_id']);
                   
                     $p=$pro->fetch(PDO::FETCH_ASSOC);
                     
                     
                     ?>
                     
                     <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $p['name']; ?></td>
                      <td><?php echo $stk['quantity'] ?></td>
                      <td><?php echo $stk['date'] ?></td>
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

