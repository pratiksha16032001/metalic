

 <?php
    include('layouts/header.php');

 ?>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
  <!-- Navbar --> 
  <?php
  include('layouts/navbar.php');
   include('layouts/sidebar.php');

 ?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                     <h3 class="card-title">Product List</h3>
                  </div>
                  <div class="col-md-6">
                   <a href="product_add.php">Add Product</a>
                  </div>
                </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>product name</th>
                    <th>category</th>
                    <th>image</th>
                    <th>Status</th>
                    <th>Created Date/Time</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                    error_reporting(0);
                    include('../connection/dbcon.php');


  $qry="SELECT * FROM `m_product` LEFT JOIN m_categories ON prod_cat_id=c_id WHERE `prod_status`='Active' order by prod_id desc ";
   //echo $qry;die;


 $run=mysqli_query($con,$qry);
// echo $row;die;

 
 $cunt=1;
                 foreach($run as $c)
                 {

                    ?>
                    <tr>
                    <td><?php echo $cunt++ ?></td>
                    <td>
<?php echo $c['prod_name'] ?>
                
                      </td>
                      <td>
<?php echo $c['c_name'] ?>
                
                      </td>
                       <td> <img src="product_images/<?php echo $c['prod_imageone']?>" style="height: 150px; width: 300;">                      
                        </td>
                    <td><?php echo $c['prod_status'] ?></td>
                    <td><?php echo $c['prod_createdat'] ?></td>
                    <td>
                     <a href="product_add.php?prod_id=<?php echo $c['prod_id'] ?>">View</a> !  <a href="product_add.php?prod_id_delete=<?php echo $c['prod_id'] ?>">Delete</a> 
                    </td>
                  </tr>
                <?php
              }
                ?>
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 <?php
include('layouts/footer.php');
?>

