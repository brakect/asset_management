<?php

require('head_c.php');
$_SESSION['menu']='product';
if(isset($_POST['quantity'])){
  $data=$_POST;
  $obj->insert('returns',$data);
}
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
      Add Return Products
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
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
            <div class="col-xs-12 col-md-12">
              <div class="col-md-6">

                <div class="form-group">
                 <select onchange="get_data()" id="p" name="Product_id" class="form-control">
                   <option value="">Select product</option>
                   <?php while ($d=$data->fetch(PDO::FETCH_ASSOC)) {?>
                     <option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
                   <?php  }?>   
                   <option></option>
                 </select>
               </div>
               <div class="form-group">
                <label>Price</label>
                <input type="text" readonly id="price" class="form-control" value="">
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="text" id="quantity" onkeyup="calculate()" name="quantity" class="form-control" value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Total</label>
                <input type="text" readonly id="t" name="total" class="form-control" value="" required>
              </div>
              <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="">
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
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script>
  function get_data(){
    var p_id=$('#p').val()
    if(p_id!=''){
      $.ajax({
        url: "get_product_info.php", 
        type: 'POST',  
        dataType: "json",
        data: { 
          productID: p_id 
        }, 
        success: function(data){
          $('#price').val(data.price);
        }
      });
    } 
  }
  function calculate() {
    var price=parseFloat($('#price').val())
    var qty=parseFloat($('#quantity').val())
    var sub_total=price*qty
    $('#t').val(sub_total)
    
  } 
</script>
<?php require('footer_c.php');?>

