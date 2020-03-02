<?php

 require('head_c.php') ;

$data=$obj->get_admin(); 

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
                  <h3>Password Reset</h3>
                </div>
                <table id="example1" class="table table-bordered table-striped" border="1">
                  <thead style="background-color: #79a0e0">
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>password</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="itembody">

                    <?php
                    $i=1;

                     while ($d=$data->fetch(PDO::FETCH_ASSOC)) {
                     // var_dump($d);
                     
                  
                  ?>

                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $d['name'] ?></td>
                      <td><?php echo $d['email'] ?></td>
                      <td><?php echo $d['password'] ?></td>
                      <td><?php echo $d['status'] ?></td>
                      <td><a href="admin_password_edit.php?id=<?php echo $d['id'] ?> "class="btn btn-primary">Password Reset</a></td>
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
