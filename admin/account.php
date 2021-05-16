<?php
session_start();
error_reporting(0);

include('../connection/dbcon.php');


 if($_SESSION['uid']!="")
 {
  
$u_id=$_SESSION['uid'];
$qry="SELECT * FROM `users` WHERE `u_id`='$u_id' ";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;
 $num = mysqli_fetch_array($run);
if($num['u_id']!= "")

{
foreach ($run as $row) 
{
 $u_username=$row['u_username'];
 $u_email=$row['u_email'];
 $u_contact=$row['u_contact'];
 $u_address=$row['u_address'];
 $u_gender=$row['u_gender'];
 $u_status=$row['u_status'];
 
}
}
 
 }else
 {
   $u_username="";
 $u_email="";
 $u_contact="";
 $u_address="";
 $u_gender="";
 $u_status="";
 
 
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
            <h1> My Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active"> My Account </li>
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
                <h3 class="card-title">My Profile </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputFile">name</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="text" name="u_username" value="<?php if($u_username!="") { echo $u_username; } else { } ?>" class="form-control" id="exampleInputFile" required>                     </div>
                      </div>
              </div>
  <div class="form-group">
                    <label for="exampleInputFile">email</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="text" name="u_email" value="<?php if($u_email!="") { echo $u_email; } else { } ?>" class="form-control" id="exampleInputFile" required>                     </div>
                      </div>
              </div>
               <div class="form-group">
                    <label for="exampleInputFile">address</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <textarea  name="u_address" value="<?php if($u_address!="") { echo $u_address; } else { } ?>" class="form-control" required>
                          <?php if($u_address!="") { echo $u_address; } else { } ?>
                        </textarea>
                                             </div>
                      </div>
              </div>    

              <div class="form-group">
                    <label for="exampleInputFile">contact</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <textarea  name="u_contact" value="<?php if($u_contact!="") { echo $u_contact; } else { } ?>" class="form-control" required>
                          <?php if($u_contact!="") { echo $u_contact; } else { } ?>
                        </textarea>
                                             </div>
                      </div>
              </div>   

              <div class="form-group">
                    <label for="exampleInputFile">gender</label>
                    <div class="input-group">
                      <div class="custom-file">
                        Male <input type="radio" name="u_gender" value="MALE" <?php if($u_gender=="MALE"){ echo "checked"; } else { } ?>>
                        Female <input type="radio" name="u_gender" value="FEMALE" <?php if($u_gender=="FEMALE"){ echo "checked"; } else { } ?>>

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
 
$u_username=$_POST['u_username'];
$u_email=$_POST['u_email'];
$u_contact=$_POST['u_contact'];
$u_address=$_POST['u_address'];
$u_gender=$_POST['u_gender'];

if($_SESSION['uid']!="")
{
  

  $u_id=$_SESSION['uid'];

 $qry="UPDATE `users` SET `u_username`='$u_username',`u_email`='$u_email',`u_contact`='$u_contact',`u_address`='$u_address',`u_gender`='$u_gender',`u_updatedat`=CURRENT_TIMESTAMP WHERE `u_id`=$u_id";

 //echo $qry;die;

$run=mysqli_query($con,$qry);
 $num =  mysqli_affected_rows($con);
           if($num>0)
           {
            ?>
    <script>
        alert('Profile Updated Successfully!!!!!!!');
    </script>

    <?php
     echo "<script>window.location.href='index.php';</script>";
            }
            else
            {
              ?>
    <script>
        alert(' Profile Not Updated!!!!!!!');
    </script>
    <?php
            }
}
else
{



 $qry="INSERT INTO `m_product`( `prod_name`, `prod_cat_id`, `prod_description`, `prod_tags`, `prod_imageone`, `prod_imagetwo`, `prod_imagethree`, `prod_imagefour`, `prod_imagefive`, `prod_status`, `prod_createdat`) VALUES ('$prod_name','$c_name','$prod_description','$prod_tags','$prod_imageone','$prod_imagetwo','$prod_imagethree','$prod_imagefour','$prod_imagefive','Active',CURRENT_TIMESTAMP) ";
  //echo $qry;die;

$run=mysqli_query($con,$qry);

if($run)

{
?>
    <script>
        alert(' product Added Successfully!!!!!!!');
    </script>
    <?php


    echo "<script>window.location.href='product_viewall.php';</script>";

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
