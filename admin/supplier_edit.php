<?php

require('head_c.php');

if(isset($_POST['name'])){
 $obj->edit_supplier($_POST);

}

$d=$_GET['id'];
$r=$obj->get_supplier_update($d);

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
        Edit Supplier
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="supplier_edit.php">Edit Supplier </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $r['name'] ?>" required>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea name="address" id="" cols="30" class="form-control" rows="10"><?php echo $r['address'] ?></textarea>
                </div>
                <div class="form-group">
                  <label></label>
                  <input type="submit" class="btn btn-primary btn-block" value="Submit">
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
