

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
    <form method="POST">
        <div class="container"> 
            <label>Username : </label> 
            <input type="text" placeholder="Enter Username" name="u_username" required>
           
             <label>email: </label> 
            <input type="text" placeholder="Enter Useremail" name="u_email" required>
            <th>contact no.</th>
            <td><input type="text" name="number" placeholder="enter contact number"required></td>
         </tr>
         <th>address</th>
            <td><input type="text" name="u_address" placeholder="enter address"required></td>
         </tr>
                  <td>gender:</td>
<td>
  <input type="radio"  value="MALE"  name="u_gender">MALE
  <input type="radio" value="FEMALE" name="u_gender">FEMALE
</td>
<br><br>
         <th>role</th>
            <td>
<select name="u_role" class="form-control">
  
 <option value="Customer"> Customer </option>
 <option value="Seller"> Seller </option>
 
</select>
            </td>
         </tr>
<td colspan="2" align="center">
                  
                    <input type="submit" name="Register" value="Save">
                   <a href="index.php">Already a member?</a>
                </td>         
        </div> 
    </form>   
</body>   
</html>


<?php
error_reporting(0);
if(isset($_POST['Register']))
{
 include('connection/dbcon.php');

$u_username=$_POST['u_username'];
$u_email=$_POST['u_email'];
$u_contact=$_POST['number'];
$u_address=$_POST['u_address'];
$u_gender=$_POST['u_gender'];
$u_role=$_POST['u_role'];

$qry="SELECT * FROM `users` WHERE `u_email`='$u_email' ";
  //echo $qry;die;


$run=mysqli_query($con,$qry);
// echo $row;die;
 $num = mysqli_fetch_array($run);
if($num['u_id']!= "")
{
?>
    <script>
        alert('Email Already Exist!!!!!!!');
    </script>
    <?php

}
else
{

 $qry="INSERT INTO `users`( `u_username`, `u_password`, `u_email`, `u_contact`, `u_address`, `u_gender`, `u_role`, `u_createdat`, `u_status`)VALUES ('$u_username','abcd@123','$u_email','$u_contact','$u_address','$u_gender','$u_role',CURRENT_TIMESTAMP,'Active')";

 //echo $qry;die;

$run=mysqli_query($con,$qry);
// echo $row;die;
if($run)

{
?>
    <script>
        alert('Registered Successfully!!!!!!!');
    </script>
    <?php


    echo "<script>window.location.href='index.php';</script>";

}
else
{
  ?>
    <script>
        alert('Registration Failed!!!!!!!');
    </script>
    <?php

}
}
}
?>











