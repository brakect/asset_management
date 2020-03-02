<?php
require('head_c.php') ;
$_SESSION['menu']='product';

$data=$obj->get_supplier();

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
                          <h3>Supplier List</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped" border="1">
                          <thead style="background-color: #79a0e0">
                            <tr>
                              <th>SL</th>
                              <th>Name</th>
                              <th>Address</th>
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
                                <td><?php echo $d['name'] ?></td>
                                <td><textarea name="" readonly class="form-control" id="" cols="60" rows="5"><?php echo $d['address'] ?></textarea></td>
                                <td><a href="supplier_delete.php?id=<?php echo $d['id'] ?>" class="btn btn-danger">Delete</a> <a href="supplier_edit.php?id=<?php echo $d['id'] ?> "class="btn btn-primary">Edit</a></td>
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
