
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
            <h1>Banners</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banners</li>
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
                     <h3 class="card-title">Banner List</h3>
                  </div>
                  <div class="col-md-6">
                   <a href="banner_add.php">Add Banner</a>
                  </div>
                </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>image</th>
                    <th>position</th>
                    <th>Status</th>
                    <th>Created Date/Time</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                    error_reporting(0);
                    include('../connection/dbcon.php');


  $qry="SELECT * FROM `m_banners` WHERE  `b_status`='Active' order by b_id desc ";
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

                 <img src="banner_images/<?php echo $c['b_image']?>" style="height: 150px; width: 300;">                      
                        
                      </td>
                       <td><?php echo $c['b_position'] ?></td>
                    <td><?php echo $c['b_status'] ?></td>
                    <td><?php echo $c['b_createdat'] ?></td>
                    <td>
                     <a href="banner_add.php?b_id=<?php echo $c['b_id'] ?>">View</a> !  <a href="banner_add.php?b_id_delete=<?php echo $c['b_id'] ?>">Delete</a> 
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

