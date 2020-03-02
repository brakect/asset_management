<?php

require('head_c.php');
$_SESSION['menu']='reports';

$data=$obj->getData('product','id='.$_GET['id']);


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
        Products details
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="product_list.php">Products List </a></li>
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
                      <th>Total Stock in</th>
                      <th>Total Stock out</th>
                      <th>Total Wastage</th>
                      <th>Total Returns</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0;
                    while( $d=$data->fetch(PDO::FETCH_ASSOC)){ ++$i;

                     $stock_in=$obj->db->query("select sum(quantity) as tsi from stock_in where product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);
                     $stock_out=$obj->db->query("select sum(quantity) as tsu from stock_out where product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);
                     $wastage=$obj->db->query("select sum(quantity) as tw from wastage where product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);
                     $returns=$obj->db->query("select sum(quantity) as tr from returns where product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);

                     ?>
                     
                     <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $d['name']; ?></td>
                      <td><?php echo $stock_in['tsi'] ?></td>
                      <td><?php echo $stock_out['tsu'] ?></td>
                      <td><?php echo $wastage['tw'] ?></td>
                      <td><?php echo $returns['tr'] ?></td>
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

