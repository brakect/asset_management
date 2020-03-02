<?php

require('head_c.php');
$_SESSION['menu']='reports';

$data=$obj->getData('product',1);
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
        Stock Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="stock_report.php">Stock Report </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="stock_report_out.php" method="post">
              <div class="col-xs-12 col-md-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th colspan="2">Start Date<input type="text" autocomplete="off"  name="d1" class="form-control datepicker" value=""></th>
                      <th colspan="2">End Date<input type="text" autocomplete="off"  name="d2" class="form-control datepicker" value=""></th>
                      <th colspan="4"> <input type="submit" name="ok" value="Result" class="form-control btn btn-success btn-block"></th>
                    </tr>
                    <tr class="bg-primary">
                      <th>SL</th>
                      <th>Product</th>
                      <th>Stock</th>
                      <th>Price</th>
                      <th>Stock value</th>
                      <th>Depreciation Rate</th>
                      <th>Depreciation amount</th>
                      <th>Current value</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0;
                    $sum=0;  $sum1=0;  $sum2=0;
                     while ( $d=$data->fetch(PDO::FETCH_ASSOC)) { ++$i;
                      $sale=$obj->db->query("select sum(quantity) as s from stock_out where date <='".date('Y-m-d')."'and product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);
                      $parchase=$obj->db->query("select sum(quantity) as p from stock_in where date <='".date('Y-m-d')."'and product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);
                      $waste=$obj->db->query("select sum(quantity) as w from wastage where date <='".date('Y-m-d')."'and product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);
                      $return=$obj->db->query("select sum(quantity) as r from returns where date <='".date('Y-m-d')."'and product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);

                      $date1=$obj->db->query("select date  from stock_in where date ='".date('Y-m-d')."'and product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC)['date'];
                      $date2= date('Y-m-d');
                      // echo "<pre>";
                      // var_dump($date2);
                       $day= date_diff(date_create($date1),date_create($date2))->format("%a");
                        // echo "<pre>";
                        // var_dump($day->format("%a"));
                      ?>
                      <tr>   
                        <td><?php echo $i ?></td>
                        <td><?php echo $d['name']; ?></td>
                        <td><?php echo $stk=$parchase['p']-($sale['s']+$waste['w'])+$return['r']; ?></td>
                        <td class="text-right"><?php echo number_format($d['price'],2); ?></td>
                        <td class="text-right"><?php echo  number_format($stv=$stk*$d['price'],2); $sum+=$stv;
                         ?></td>
                        <td class="text-right"><?php echo $dv=$d['depreciation']  ?></td>
                        <td class="text-right"><?php echo number_format($a=($stv*$dv)/100 ,2);
                        $sum1+=$a;
                           
                         ?></td>
                        <td class="text-right"><?php  
                        echo number_format($cv=($stv-($a*$day)/365),2); $sum2+=$cv; ?></td>
                      </tr>

                    <?php } ?>
                      <tr>
                        <th colspan="4" class="text-right">Total:</th>
                        <th class="text-right"><?php echo number_format($sum,2); ?></th>
                        <th colspan="2" class="text-right"><?php echo number_format($sum1,2)  ?></th>
                        <th class="text-right"><?php echo number_format($sum2,2); ?></th>
                      
                      </tr>
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

