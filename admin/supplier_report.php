<?php

require('head_c.php');
$_SESSION['menu']='reports';

$data=$obj->getData('supplier',1);



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
        Supplier Report
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
            <div class="col-xs-12 col-md-12">
              <table class="table table-bordered">
                <thead>
                  <tr class="bg-primary">
                    <th>SL</th>
                    <th>Supplier Name</th>
                    <th>Address</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=0;
                  while( $sup=$data->fetch(PDO::FETCH_ASSOC)){ ++$i;
                    
                   $stk=$obj->db->query("select * from stock_in where supplier_id=".$sup['id']);
                   $t=0;
                   while ($st=$stk->fetch(PDO::FETCH_ASSOC)) {
                     $t+=$st['total'];
                   }
                   ?>
                   
                   <tr>
                    <td><?php echo $i ?></td>
                    <td><a href="supplier_details.php?id=<?php echo $sup['id'] ?>"><?php echo $sup['name'] ?></a></td>
                    <td><?php echo $sup['address'] ?></td>
                    <td><?php echo $t ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
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

