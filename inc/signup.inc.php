<?php

if (isset($_POST['submit'])) {
    

    //grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];
    $email = $_POST['email'];




    //instantiate signupContr class
     include "../classes/dbh.classes.php";
     include "../classes/signup.classes.php";
     include "../classes/signup-contr.classes.php";
     $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);


    //running error handlers and user signup
     $signup->signupUser();

    
     //redirecting to the home page
     header("location: ../index.php?error=none");

     //redirecting to the home page
     header("location: ../index.php?error=failed");  
  

}