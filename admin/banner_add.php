<?php
error_reporting(0);
include('../connection/dbcon.php');

if($_GET['b_id_delete']!="")
{
  $b_id=$_GET['b_id_delete'];
$sql = "DELETE FROM `m_banners` WHERE `b_id`='$b_id' ";
 $run = mysqli_query($con, $sql);
 if($run)
 {
      echo '<script>alert("Banner Deleted.");</script>';
     echo "<script>window.location.href='banner_viewall.php';</script>";

     
 }
 else
 {
     echo '<script>alert("Banner Not Deleted!!");</script>';
     echo "<script>window.location.href='banner_viewall.php';</script>";
 }
}

 if($_GET['b_id']!="")
 {
  
$b_id=$_GET['b_id'];
$qry="SELECT * FROM `m_banners` WHERE `b_id`='$b_id' ";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;
 $num = mysqli_fetch_array($run);
if($num['b_id']!= "")

{
foreach ($run as $row) 
{
 $b_image=$row['b_image'];
 $b_position=$row['b_position']; 
}
}
 
 }else
 {
  $b_image="";
  $b_position="";
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
            <h1>Banner Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Banner Form</li>
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
                <h3 class="card-title">Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">Position</label>
                  <select name="Position" class="form-control" required>
                      <option value="<?php if($b_position!=''){
                      echo $b_position;
                    } else { echo ''; }?> "><?php if($b_position!=''){
                      echo $b_position;
                    } else { echo 'Select Position'; }?> </option>

                   <!--  <option value="" disabled="" selected="">select Position</option> -->
                     <option value="1">1</option>

                      <option value="2">2</option>
                      <option value="3">3</option>
                  </select>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputFile">image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="b_image" style="width: 250px;" class="form-control" id="exampleInputFile">
                        <input type="hidden" name="h_b_image" value="<?php echo $b_image; ?>">
                       
                        <img src="banner_images/<?php echo $b_image; ?>" style="height: 129px; width: 300px; float:right;">


                      </div>
                     
                    </div>
                  </div>
                  
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
 
$Position=$_POST['Position'];


if($_POST['h_b_image']!="" && $_FILES['b_image']['name']=="")
{
  if($_GET['b_id']!="")
  {
     $b_image=$_POST['h_b_image'];
  }
 else
 {
    ?>
    <script>
        alert(' Banner image required!!!!!!!');
    </script>

    <?php
 }
}
else
{
  $b_image = $_FILES['b_image']['name'];

  $tempname = $_FILES['b_image']['tmp_name'];
 move_uploaded_file($tempname,"banner_images/$b_image");

}
if($_GET['b_id']!="")
{
  

  $b_id=$_GET['b_id'];
 $qry="UPDATE `m_banners` SET `b_position`='$Position',`b_image`='$b_image',`b_updatedat`=CURRENT_TIMESTAMP WHERE `b_id`=$b_id";

 //echo $qry;die;

$run=mysqli_query($con,$qry);
 $num =  mysqli_affected_rows($con);
           if($num>0)
           {
            ?>
    <script>
        alert(' Banner Updated Successfully!!!!!!!');
    </script>

    <?php
     echo "<script>window.location.href='banner_viewall.php';</script>";
            }
            else
            {
              ?>
    <script>
        alert(' Banner Not Updated!!!!!!!');
    </script>
    <?php
            }
}
else
{



 $qry="INSERT INTO `m_banners`( `b_image`, `b_position`, `b_status`, `b_createdat`) VALUES ('$b_image','$Position','Active',CURRENT_TIMESTAMP) ";
  //echo $qry;die;

$run=mysqli_query($con,$qry);

if($run)

{
?>
    <script>
        alert(' Banner Added Successfully!!!!!!!');
    </script>
    <?php


    echo "<script>window.location.href='banner_viewall.php';</script>";

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