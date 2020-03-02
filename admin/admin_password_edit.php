<?php

 require('head_c.php');



 $d=$_GET['id'];
 $r=$obj->get_for_update($d);

 
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
        Add new product
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="new_product.php">Add new product </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="admin_password_update.php" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
                <div class="col-md-6">
                  <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                 
                 <div class="form-group">
                    <label> old Password</label>
                    <input type="text" name="" class="form-control" value=" <?php echo $r['password'] ?>" required>
                  </div>
                  
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>new Password</label>
                    <input type="password" name="password" class="form-control" value="" required>
                  </div>
                  
                  <div class="form-group">
                <label></label>
                <input type="submit" class="btn btn-primary btn-block" value="Submit">
              </div>
              </div>
              
              
            </div>
          </form>
        </div>
        </div>
        </div>
        
        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- ./wrapper -->
    <?php require('footer_c.php');?>
