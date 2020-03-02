<?php

require('head_c.php') ;
$_SESSION['menu']='product';

$data=$obj->get_product();

?>
<div class="wrapper">
  <?php
  require('leftMenu.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
                <div class="row" style="padding: 5px">
                  <div class="box">
                    <div class="box">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="col-md-12" style="color: #79a0e0">
                          <h3>Product List</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped" border="1">
                          <thead style="background-color: #79a0e0">
                            <tr>
                              <th>SL</th>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Photo</th>
                              <th>Unit</th>
                              <th>Depreciation</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="itembody">

                            <?php $i=1;
                            while ($d=$data->fetch(PDO::FETCH_ASSOC)) {
                    // echo "<pre>";
                    // var_dump($d); exit();
                              ?>
                              <tr>
                                <td class="text-right"><?php echo $i++; ?></td>
                                <td class="text-right"><?php echo $d['id'] ?></td>
                                <td><a href="product_details.php?id=<?php echo $d['id'] ?>"><?php echo $d['name'] ?></a></td>
                                <td class="text-right"><?php echo number_format($d['price'],2); ?></td>
                                <td><img src="product_pic/<?php echo $d['photo'] ?>" height="100" width="100" alt=""></td>
                                <td><?php echo $d['unit'] ?></td>
                                <td class="text-right"><?php echo $d['depreciation'] ?></td>
                                <td><a href="product_delete.php?id=<?php echo $d['id'] ?>" class="btn btn-danger">Delete</a> <a href="product_edit.php?id=<?php echo $d['id'] ?> "class="btn btn-primary">Edit</a></td>
                              </tr>
                            <?php } ?>

                          </tbody>
                        </table>
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
