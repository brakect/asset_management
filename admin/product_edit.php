<?php

 require('head_c.php');

if(isset($_POST['name'])){
 $obj->update_product_photos($_POST);

}

 $d=$_GET['id'];
 $r=$obj->get_product_update($d);

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
        Edit products
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="product_edit.php">Edit products </a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
                <div class="col-md-6">
                  <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value=" <?php echo $r['name'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value=" <?php echo $r['price'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" value=" <?php echo $r['photo'] ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Unit</label>
                    <input type="text" name="unit" class="form-control" value=" <?php echo $r['unit'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Depreciation</label>
                   <input type="text"  name="depreciation" class="form-control"  value=" <?php echo $r['depreciation'] ?>" required>
                    
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
