<?php
error_reporting(0);
include('../connection/dbcon.php');

if($_GET['c_id_delete']!="")
{
  $c_id=$_GET['c_id_delete'];
$sql = "DELETE FROM `m_categories` WHERE `c_id`='$c_id' ";
 $run = mysqli_query($con, $sql);
 if($run){
      echo '<script>alert("Category Deleted.");</script>';
     echo "<script>window.location.href='category_viewall.php';</script>";

     
 }
 else
 {
     echo '<script>alert("Category Not Deleted!!");</script>';
     echo "<script>window.location.href='category_viewall.php';</script>";
 }
}

 if($_GET['c_id']!="")
 {
  
$c_id=$_GET['c_id'];
$qry="SELECT * FROM `m_categories` WHERE `c_id`='$c_id' ";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;
 $num = mysqli_fetch_array($run);
if($num['c_id']!= "")

{
foreach ($run as $row) 
{
 $catagory_name=$row['c_name']; 
}
}
 
 }else
 {
  $catagory_name=""; 
 }




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
            <h1>Category Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Category Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Name</label>
                    <input required type="text" name="c_name" value="<?php if($catagory_name!=''){

                      echo $catagory_name;
                    } else { echo ''; }?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" name="submit" class="btn btn-primary">
                </div>
              </form>
            </div>
           

          </div>
       
          <div class="col-md-6">
            
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
include('layouts/footer.php');

?>
<?php
error_reporting(0);
if(isset($_POST['submit']))
{
 
$c_name=$_POST['c_name'];

$qry="SELECT * FROM `m_categories` WHERE `c_name`='$c_name' ";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;
 $num = mysqli_fetch_array($run);
if($num['c_id']!= "")
{
?>
    <script>
        alert('Category Already Exist!!!!!!!');
    </script>
    <?php

}
else
{
if($_GET['c_id']!="")
{
  $c_name=$_POST['c_name'];
  $c_id=$_GET['c_id'];
 $qry="UPDATE `m_categories` SET `c_name`='$c_name',`c_updatedat`=CURRENT_TIMESTAMP WHERE `c_id`=$c_id";

 //echo $qry;die;

$run=mysqli_query($con,$qry);
 $num =  mysqli_affected_rows($con);
           if($num>0)
           {
            ?>
    <script>
        alert(' Category Updated Successfully!!!!!!!');
    </script>
    <?php
            }
            else
            {
              ?>
    <script>
        alert(' Category Not Updated!!!!!!!');
    </script>
    <?php
            }
}

 $qry="INSERT INTO `m_categories`( `c_name`, `c_status`, `c_createdat`) VALUES ('$c_name','Active',CURRENT_TIMESTAMP)";

 //echo $qry;die;

$run=mysqli_query($con,$qry);

if($run)

{
?>
    <script>
        alert(' Category Added Successfully!!!!!!!');
    </script>
    <?php


    echo "<script>window.location.href='category_viewall.php';</script>";

}
else
{
  ?>
    <script>
        alert('Insertion Failed!!!!!!!');
    </script>
    <?php

}
}
}
?>