<?php

if (isset($_POST['submit'])) {
	

	//grabbing the data
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];

	//instantiate signupContr class
	 include "../classes/dbh.classes.php";
     include "../classes/login.classes.php";
     include "../classes/login-contr.classes.php";
     $login = new LoginContr($uid, $pwd);


	//running error handlers and user signup
     $login->loginUser();

	//going back to front page
     header("location: ../home_page.php?error=none");

}