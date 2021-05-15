<?php
error_reporting(0);
include('../connection/dbcon.php');

if($_GET['prod_id_delete']!="")
{
  $prod_id=$_GET['prod_id_delete'];
$sql = "DELETE FROM `m_product` WHERE `prod_id`='$prod_id' ";
 $run = mysqli_query($con, $sql);
 if($run)
 {
      echo '<script>alert("product Deleted.");</script>';
     echo "<script>window.location.href='product_viewall.php';</script>";

     
 }
 else
 {
     echo '<script>alert("product Not Deleted!!");</script>';
     echo "<script>window.location.href='product_viewall.php';</script>";
 }
}

 if($_GET['prod_id']!="")
 {
  
$prod_id=$_GET['prod_id'];
$qry="SELECT * FROM `m_product` LEFT JOIN m_categories ON prod_cat_id=c_id  WHERE `prod_id`='$prod_id' ";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;
 $num = mysqli_fetch_array($run);
if($num['prod_id']!= "")

{
foreach ($run as $row) 
{
 $prod_imageone=$row['prod_imageone'];
 $prod_imagetwo=$row['prod_imagetwo'];
 $prod_imagethree=$row['prod_imagethree'];
 $prod_imagefour=$row['prod_imagefour'];
 $prod_imagefive=$row['prod_imagefive'];
 $prod_status=$row['prod_status'];
 $prod_tags=$row['prod_tags'];
  $prod_description=$row['prod_description'];
 $prod_name=$row['prod_name'];
 $c_name=$row['c_name'];
 
}
}
 
 }else
 {
   $prod_imageone="";
 $prod_imagetwo="";
 $prod_imagethree="";
 $prod_imagefour="";
 $prod_imagefive="";
 $prod_status="";
 $prod_tags="";
  $prod_description="";
 $prod_name="";
 $c_name="";
 
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
            <h1>Product Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Product Form</li>
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
                <h3 class="card-title">Product </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInput">category</label>
                  <select name="c_name" class="form-control" required>
                      <option value="<?php if($c_name!=''){
                      echo $c_name;
                    } else { echo ''; }?> "><?php if($c_name!=''){
                      echo $c_name;
                    } else { echo 'Select category'; }?> </option>

                   <!--  <option value="" disabled="" selected="">select Position</option>-->
                  <?php
                    error_reporting(0);
                    include('../connection/dbcon.php');


$qry="SELECT * FROM `m_categories` WHERE `c_status`='Active' order by c_id desc ";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;

 
 $cunt=1;
                 foreach($run as $c)
                 {
                    ?>

                     <option value="<?php echo $c['c_id']; ?>"><?php echo $c['c_name']; ?></option>
<?php   
                 }
                 ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">name</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="text" name="prod_name" value="<?php if($prod_name!="") { echo $prod_name; } else { } ?>" class="form-control" id="exampleInputFile" required>                     </div>
                      </div>
              </div>
  <div class="form-group">
                    <label for="exampleInputFile">tags</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="text" name="prod_tags" value="<?php if($prod_tags!="") { echo $prod_tags; } else { } ?>" class="form-control" id="exampleInputFile" required>                     </div>
                      </div>
              </div>
               <div class="form-group">
                    <label for="exampleInputFile">description</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <textarea  name="prod_description" value="<?php if($prod_description!="") { echo $prod_description; } else { } ?>" class="form-control" required>
                          <?php if($prod_description!="") { echo $prod_description; } else { } ?>
                        </textarea>
                                             </div>
                      </div>
              </div>

                
                  <div class="form-group">
                    <label for="exampleInputFile">imageone</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="prod_imageone" style="width: 250px;" class="form-control" id="exampleInputFile" >
                        <input type="hidden" name="h_prod_imageone" value="<?php echo $prod_imageone; ?>">
                       
                        <img src="product_images/<?php echo $prod_imageone; ?>" style="height: 129px; width: 300px; float:right;">
 </div>
                     
                    </div>
                  </div>
<div class="form-group">
                    <label for="exampleInputFile">imagetwo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="prod_imagetwo" style="width: 250px;" class="form-control" id="exampleInputFile" >
                        <input type="hidden" name="h_prod_imagetwo" value="<?php echo $prod_imagetwo; ?>">
                       
                        <img src="product_images/<?php echo $prod_imagetwo; ?>" style="height: 129px; width: 300px; float:right;">
 </div>
                     
                    </div>
                  </div><div class="form-group">
                    <label for="exampleInputFile">imagethree</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="prod_imagethree" style="width: 250px;" class="form-control" id="exampleInputFile">
                        <input type="hidden" name="h_prod_imagethree" value="<?php echo $prod_imagethree; ?>">
                       
                        <img src="product_images/<?php echo $prod_imagethree; ?>" style="height: 129px; width: 300px; float:right;">
 </div>
                     
                    </div>
                  </div><div class="form-group">
                    <label for="exampleInputFile">imagefour</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="prod_imagefour" style="width: 250px;" class="form-control" id="exampleInputFile">
                        <input type="hidden" name="h_prod_imagefour" value="<?php echo $prod_imagefour; ?>">
                       
                        <img src="product_images/<?php echo $prod_imagefour; ?>" style="height: 129px; width: 300px; float:right;">
 </div>
                     
                    </div>
                  </div><div class="form-group">
                    <label for="exampleInputFile">imagefive</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="prod_imagefive" style="width: 250px;" class="form-control" id="exampleInputFile">
                        <input type="hidden" name="h_prod_imagefive" value="<?php echo $prod_imagefive; ?>">
                       
                        <img src="product_images/<?php echo $prod_imagefive; ?>" style="height: 129px; width: 300px; float:right;">
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
 
$prod_name=$_POST['prod_name'];
$c_name=$_POST['c_name'];
$prod_tags=$_POST['prod_tags'];
$prod_description=$_POST['prod_description'];



if($_POST['h_prod_imageone']!="" && $_POST['h_prod_imagetwo']!="" &&  $_POST['h_prod_imagethree']!="" &&  $_POST['h_prod_imagefour']!="" &&  $_POST['h_prod_imagefive']!="" && $_FILES['prod_imageone']['name']=="" && $_FILES['prod_imagetwo']['name']=="" && $_FILES['prod_imagethree']['name']=="" && $_FILES['prod_imagefour']['name']=="" && $_FILES['prod_imagefive']['name']=="" )
{
  if($_GET['prod_id']!="")
  {
     $prod_imageone=$_POST['h_prod_imageone'];
      $prod_imagetwo=$_POST['h_prod_imagetwo']; 
      $h_prod_imagethree=$_POST['h_prod_imagethree'];
   $prod_imagefour=$_POST['h_prod_imagefour'];
    $prod_imagefive=$_POST['h_prod_imagefive'];

  }
 else  
 {
    ?>
    <script>
        alert(' product image required!!!!!!!');
    </script>

    <?php
 }
}
else
{
  $prod_imageone = $_FILES['prod_imageone']['name'];
  $tempname = $_FILES['prod_imageone']['tmp_name'];
 move_uploaded_file($tempname,"product_images/$prod_imageone");


$prod_imagetwo = $_FILES['prod_imagetwo']['name'];
  $tempname = $_FILES['prod_imagetwo']['tmp_name'];
 move_uploaded_file($tempname,"product_images/$prod_imagetwo");

 $prod_imagethree = $_FILES['prod_imagethree']['name'];
  $tempname = $_FILES['prod_imagethree']['tmp_name'];
 move_uploaded_file($tempname,"product_images/$prod_imagethree");

 $prod_imagefour = $_FILES['prod_imagefour']['name'];
  $tempname = $_FILES['prod_imagefour']['tmp_name'];
 move_uploaded_file($tempname,"product_images/$prod_imagefour");

 $prod_imagefive = $_FILES['prod_imagefive']['name'];
  $tempname = $_FILES['prod_imagefive']['tmp_name'];
 move_uploaded_file($tempname,"product_images/$prod_imagefive");

}
if($_GET['prod_id']!="")
{
  

  $prod_id=$_GET['prod_id'];

 $qry="UPDATE `m_product` SET `prod_name`='$prod_name',`prod_cat_id`='$c_name',`prod_description`='$prod_description',`prod_tags`='$prod_tags',`prod_imageone`='$prod_imageone',`prod_imagetwo`='$prod_imagetwo',`prod_imagethree`='$prod_imagethree',`prod_imagefour`='$prod_imagefour',`prod_imagefive`='$prod_imagefive',`prod_status`='Active',`prod_createdat`=CURRENT_TIMESTAMP WHERE `prod_id`=$prod_id";

 //echo $qry;die;

$run=mysqli_query($con,$qry);
 $num =  mysqli_affected_rows($con);
           if($num>0)
           {
            ?>
    <script>
        alert(' product Updated Successfully!!!!!!!');
    </script>

    <?php
     echo "<script>window.location.href='product_viewall.php';</script>";
            }
            else
            {
              ?>
    <script>
        alert(' product Not Updated!!!!!!!');
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