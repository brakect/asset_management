<?php 
if(isset($_POST['logout'])){
    $obj->logout();
}
?>
<div class="wrapper">
    <header class="main-header">
        <a href="" class="logo">
            <span class="logo-mini"><b>STK</b></span>
            <span class="logo-lg"><b>CONTROL PANEL</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li><a href="" target="_blank"><i class="fa fa-globe"></i></a></li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="images/<?php echo $_SESSION['photo'] ?>" class="user-image"
                            alt="User Image">
                            <span class="hidden-xs">
                                <?php
                                echo $_SESSION['name'];
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="images/<?php echo $_SESSION['photo'] ?>" class="img-circle"
                                alt="User Image">
                                <p>
                                    <?php
                                    echo $_SESSION['name'];
                                    ?>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                    </div>
                                    <div class="col-xs-4 text-center">
                                    </div>
                                    <div class="col-xs-4 text-center">
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">                               
                                </div>
                                <div class="pull-right">
                                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                        <input type="submit"
                                        class="btn btn-default btn-flat" name="logout" value="Sign out">
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="active"><a href="dashboard.php"><i class="fa fa-circle-o"></i>Dashboard </a>
                </li>
                <li class="treeview <?php  if($_SESSION['menu']=='admin'){ echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-clone"></i> <span>Admin </span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="new_admin.php"><i class="fa fa-user"></i>
                        Add New Admin  </a></li>
                        <li class="active"><a href="user.php"><i class="fa fa-user"></i>
                        Admin List </a></li>
                        <li class="active"><a href="admin_password.php"><i class="fa fa-user"></i>
                        Password reset </a></li>
                    </ul>
                </li>
                <li class="treeview <?php  if($_SESSION['menu']=='product'){ echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-clone"></i><span>Product </span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="new_product.php"><i class="fa fa-user"></i>Add New Product </a></li>
                        <li class="active">
                            <a href="product_list.php"><i class="fa fa-user"></i>Product List </a></li>
                        <li class="active">
                            <a href="add_supplier.php"><i class="fa fa-user"></i>Add new Supplier </a></li>
                        <li class="active">
                            <a href="supplier_list.php"><i class="fa fa-user"></i>Supplier List </a></li>
                        <li class="active">
                            <a href="stock_in.php"><i class="fa fa-user"></i>Add Stock in </a></li>
                        <li class="active">
                            <a href="stock_in_list.php"><i class="fa fa-user"></i>Stock in List </a></li>
                        <li class="active">
                            <a href="stock_out.php"><i class="fa fa-user"></i>Add Stock out </a></li>
                        <li class="active">
                            <a href="stock_out_list.php"><i class="fa fa-user"></i>Stock out List </a></li>
                        <li class="active">
                            <a href="wastage_product.php"><i class="fa fa-user"></i>Add Wastage Product </a></li>
                        <li class="active">
                            <a href="wastage_list.php"><i class="fa fa-user"></i>Wastage Product List </a></li>
                        <li class="active">
                            <a href="returns_product.php"><i class="fa fa-user"></i>Add Return Product </a></li> 
                        <li class="active">
                            <a href="returns_list.php"><i class="fa fa-user"></i>Returns Product List </a></li>
                    </ul>
                </li>
                <li class="treeview <?php  if($_SESSION['menu']=='reports'){ echo "active";} ?>">
                    <a href="#"><i class="fa fa-clone"></i> <span>Reports </span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="stock_report.php"><i class="fa fa-user"></i>Stock Reports </a></li>
                        <li class="active"><a href="supplier_report.php"><i class="fa fa-user"></i>Supplier Reports </a></li>
                        <li class="active"><a href="wastage_report.php"><i class="fa fa-user"></i>Wastage Reports </a></li>
                        <li class="active"><a href="returns_report.php"><i class="fa fa-user"></i>Returns Reports </a></li>
                    </ul>
                </li>
            </ul>
        </section>
    <!-- /.sidebar -->
</aside>
