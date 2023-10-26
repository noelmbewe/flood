<?php

include 'db.php';



session_start();
if (isset($_POST['submit'])) {
    $email  = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";


    $sql1 = "SELECT * FROM agents WHERE email='$email' AND password='$password' ";

    $sql2 = "SELECT * FROM donners WHERE email='$email' AND password='$password' ";

     $result = mysqli_query($conn, $sql);
     $result1 = mysqli_query($conn, $sql1);
     $result2 = mysqli_query($conn, $sql2);
   

  if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
    
        $_SESSION['email'] = $row['email'];
        header("Location: admindashboard.php?=admin login success");
    }
        if($result1->num_rows > 0) {
        $row = mysqli_fetch_assoc($result1);
         $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        header("Location: agentdashboard.php?=agent login success");
    }


     if($result2->num_rows > 0) {
        $row = mysqli_fetch_assoc($result2);

        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
      
        header("Location: donordashboard.php?=donor login success");
    }

   
     else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Flood Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/flood.ico">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="login.php" method="POST">
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" value="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" value="Password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
											   </div>
                                            </div>

                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="register.php">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>

</body>

</html>