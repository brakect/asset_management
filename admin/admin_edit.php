<?php

 require('head_c.php');



 $d=$_GET['id'];
 $r=$obj->get_admin_update($d);

 
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
        Edit Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="admin_edit.php">Edit Admin</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="admin_update.php" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
                <div class="col-md-6">
                  <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value=" <?php echo $r['name'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value=" <?php echo $r['email'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Active<input type="radio" name="status" class="form-control" <?php if($r['status']=='active'){ echo 'checked';} ?> value="active" required></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Inactive<input type="radio" name="status" class="form-control" <?php if($r['status']=='inactive'){ echo 'checked';} ?> value="inactive" required></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value=" <?php echo $r['password'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" value=" <?php echo $r['photo'] ?>" >
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
