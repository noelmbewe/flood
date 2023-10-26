

<?php

$servername = "pdb56.brightersettinghost.com";
$username = "4153626_dlhos061";
$password = "dlhoskorean12!@!";
$dbname = "4153626_dlhos061";

// Create connection

$conn =  mysqli_connect($servername,$username,$password,"$dbname");

if (!$conn) {
  
  die("Could Not Connect:" .mysqli_connect_error());
}





session_start();
ob_start();

if (isset($_POST['submit'])) {
    $dhlos_username  = $_POST['dhlos_username'];
    $$dlhosPassword = $_POST['$dlhosPassword'];
  

   $sql = "SELECT * FROM admin0611 WHERE  dhlos_username='$dhlos_username'   AND dlhosPassword='$dlhosPassword'";



    

     $result = mysqli_query($conn, $sql);
    


  if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $row['userid'];
   
        header("Location:home_page.php?=admin login success");
    }
        


     else {
        echo "<script>alert('Woops! username or Password is Wrong.')</script>";
    }
}





?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Job Finder</title>

<link rel="shortcut icon" href="img/logo2.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
<img class="img-fluid" src="" >
</div>
<div class="login-right">
<div class="login-right-wrap">

<p class="account-subtitle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="register.html">
<img class="avatar-img rounded-circle" alt="User Image" src="img/logo2.png"></a></p>

	<h1 style="font-size: 24px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGIN</h1>
<h2></h2>

<form  method="POST" action="index.php">
<div class="form-group">
<label>Username<span class="login-danger">*</span></label>
<input class="form-control" name="username" type="text">
<span class="profile-views"><i class="fas fa-user-circle"></i></span>
</div>
<div class="form-group">
<label>Password <span class="login-danger">*</span></label>
<input class="form-control pass-input" name="password" type="password">
<span class="profile-views feather-eye toggle-password"></span>
</div>
<div class="forgotpass">
<div class="remember-me">
<label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
<input type="checkbox" name="radio">
<span class="checkmark"></span>
</label>
</div>
<a href="forgot-password.html">Forgot Password?</a>
</div>
<div class="form-group">
<button class="btn btn-primary btn-block" name="submit" type="submit">Login</button>
</div>
</form>

<div class="login-or">
<span class="or-line"></span>
<span class="span-or"></span>

<div class="forgotpass">
<div class="remember-me">
<center><a href="register.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create an account</a></center>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>