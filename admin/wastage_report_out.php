
<?php require('head_c.php'); ?>
<div class="wrapper">
  <?php require('leftMenu.php');

  $data=$obj->getData('product',1);
  $data1=$obj->getData('wastage',1)->fetch(PDO::FETCH_ASSOC);
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Wastage Report Out
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="wastage_report_out.php">Wastage Report Out </a></li>
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
                      <th colspan="2">Start Date<input type="text" autocomplete="off"  name="d1" class="form-control datepicker" value="<?php date('Y-m-d'); ?>"></th>
                      <th colspan="2">End Date<input type="text" autocomplete="off" name="d2" class="form-control datepicker" value="<?php date('Y-m-d'); ?>"></th>
                      <th colspan="5"> <input type="submit" name="ok" value="Result" class="form-control btn btn-success btn-block"></th>
                    </tr>
                    <tr class="bg-primary">
                      <th>SL</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total value</th>
                      <th>Depreciation Rate</th>
                      <th>Depreciation amount</th>
                      <th>Wastage value</th>
                      <th>Wastage Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=0;  $sum=0;  $sum1=0;  $sum2=0; 
                    // $d1=date_create($_POST['d1']);
                    // $d2=date_create($_POST['d2']);
                    $date1=date_create($_POST['d1'])->format('Y-m-d');
                    $date2=date_create($_POST['d2'])->format('Y-m-d');

                    while ( $d=$data->fetch(PDO::FETCH_ASSOC)) { ++$i;
                      
                      $waste=$obj->db->query("select sum(quantity) as w from wastage where date between '".$date1."' and '".$date2."'and product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC);

                      $date=$obj->db->query("select date  from wastage where date ='".$date1."'and product_id=".$d['id'])->fetch(PDO::FETCH_ASSOC)['date'];
                      
                      $day= date_diff(date_create($date),date_create($date2))->format("%a");
                      ?>
                      <tr>   
                        <td><?php echo $i ?></td>
                        <td><?php echo $d['name']; ?></td>
                        <td><?php echo $waste['w']; ?></td>
                        <td class="text-right"><?php echo number_format($d['price'],2); ?></td>
                        <td class="text-right"><?php echo  number_format($wtv=$waste['w']*$d['price'],2); $sum+=$wtv;
                        ?></td>
                        <td class="text-right"><?php echo $dv=$d['depreciation']  ?></td>
                        <td class="text-right"><?php echo number_format($a=($wtv*$dv)/100,2); $sum1+=$a; ?></td>
                        <td class="text-right"><?php echo number_format($cv=($wtv-($a*$day)/365),2); $sum2+=$cv; ?></td>
                        <td><a href="wastage_info.php?id=<?php echo $d['id'] ?>" class="btn btn-info">Show</a></td>
                      </tr>
                      
                    <?php } ?>
                    <tr>
                      <th colspan="4" class="text-right">Total:</th>
                      <th class="text-right"><?php echo number_format($sum,2); ?></th>
                      <th colspan="2" class="text-right"><?php echo number_format($sum1,2);  ?></th>
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


