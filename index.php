

<?php
session_start();

 
  if (isset($_SESSION['uid']))
  {    
  echo "<script>window.location.href='admin/index.php';</script>";
    }
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
            <label>Username : </label> 
            <input type="text" placeholder="Enter Username" name="username" required>
            <label>Password : </label> 
            <input type="password" placeholder="Enter Password" name="password" required>
             
<td colspan="2" align="center">
                    
                    <input type="submit" class="cancelbtn" name="Login" value="Login">
                   <a href="register.php"> Sign up? </a> 
            
            Forgot <a href="forgot.php"> password? </a>
                </td>         
        </div> 
    </form>   
</body>   
</html>
<?php


if(isset($_POST['Login']))
  
{
 include('connection/dbcon.php');

$username=$_POST['username'];
$password=$_POST['password'];

$qry="SELECT * FROM `users` WHERE `u_username`='$username' and `u_password`='$password' and `u_role`='Admin'";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;
 $num = mysqli_fetch_array($run);
if($num['u_id']!= "")

{
    $_SESSION['uid']=$num['u_id'];
        $_SESSION['uname']=$num['u_id'];


echo "<script>window.location.href='admin/index.php';</script>";

}
else
{
  ?>
    <script>
        alert('Please Enter Correct Username and Password!!!!!!!');
    </script>
    <?php

}
}
?>

