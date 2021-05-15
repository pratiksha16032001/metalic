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
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                     <h3 class="card-title">Category List</h3>
                  </div>
                  <div class="col-md-6">
                   <a href="category_add.php">Add Category</a>
                  </div>
                </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created Date/Time</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                    error_reporting(0);
                    include('../connection/dbcon.php');


$qry="SELECT * FROM `m_categories` WHERE `c_status`='Active' order by c_id desc ";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;

 
 $cunt=1;
                 foreach($run as $c)
                 
                    ?>
                    <tr>
                    <td><?php echo $cunt++ ?></td>
                    <td><?php echo $c['c_name'] ?></td>
                    <td><?php echo $c['c_status'] ?></td>
                    <td><?php echo $c['c_createdat'] ?></td>
                    <td>
                     <a href="category_add.php?c_id=<?php echo $c['c_id'] ?>">View</a> !  <a href="category_add.php?c_id_delete=<?php echo $c['c_id'] ?>">Delete</a> 
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