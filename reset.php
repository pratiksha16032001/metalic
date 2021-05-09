<?php
session_start();


?>


<!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>
<style> 
Body {
  font-family: Calibri, Helvetica, sans-serif;
  background-color: pink;
}
button { 
       background-color: #4CAF50; 
       width: 100%;
        color: orange; 
        padding: 15px; 
        margin: 10px 0px; 
        border: none; 
        cursor: pointer; 
         } 
 form { 
        border: 3px solid #f1f1f1; 
    } 
 input[type=text], input[type=password] { 
        width: 100%; 
        margin: 8px 0;
        padding: 12px 20px; 
        display: inline-block; 
        border: 2px solid green; 
        box-sizing: border-box; 
    }
 button:hover { 
        opacity: 0.7; 
    } 
  .cancelbtn { 
        width: auto; 
        padding: 10px 18px;
        margin: 10px 5px;
    } 
      
   
 .container { 
        padding: 25px; 
        background-color: lightblue;
    } 
</style> 
</head>  
<body>  
    <center> <h1> Student Login Form </h1> </center> 
    <form method="post">
        <div class="container"> 
            <label>New Password : </label> 
            <input type="password" placeholder="New Password" name="n_password" required>
              <label>Confirm Password : </label> 
            <input type="password" placeholder="Confirm Password" name="c_password" required>
           
             
<td colspan="2" align="center">
                    
                    <input type="submit" class="cancelbtn" name="Login" value="Reset-Password">
                
                </td>         
        </div> 
    </form>   
</body>   
</html>

<?php


if(isset($_POST['Login']))
  
{
 include('connection/dbcon.php');

$n_password=$_POST['n_password'];
$c_password=$_POST['c_password'];

if($n_password==$c_password)
{
$id=$_SESSION['u_id'];

$qry="UPDATE `users` SET `u_password`='$c_password' WHERE `u_id`='$id'";

  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;
 
if($run)

{
    session_destroy();
    ?>
    <script>
        alert('Password Changed!!!!!!');
    </script>
    <?php
echo "<script>window.location.href='index.php';</script>";


}
else
{
  ?>
    <script>
        alert('Password Not Changed!!!!!!');
    </script>
    <?php

}
}
else
{
    ?>
    <script>
        alert('Password Not Matched!!!!!!');
    </script>
    <?php
}  



}
?>

