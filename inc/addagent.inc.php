<?php

session_start();
ob_start();

 
include '../classes/Database.php';
$db = new Database();

  if (isset($_POST['submit'])) {
  $table = 'agents';
  $fields = array(
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "email" => $_POST['email'],
        "phonenumber" => $_POST['phonenumber'],
        "gender" => $_POST['gender'],
        "address" => $_POST['address'],
        "password" => $_POST['password'],
        "image" => $_FILES['image']['name'],
  );


  // looking for target folder for images
  $target = "../imgs/".basename($_FILES['image']['name']);
  $wow = pathinfo($target,PATHINFO_EXTENSION);
  $filesize =  $_FILES['image']['size'];

  $resultData = $db->save($table, $fields);

  if ($resultData  && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

     //redirecting to the home page
     $_SESSION['message1'] = "Sent successfully";
     header("location: ../add_agents.php?error=none");


       }else{
    echo "Not Saved";
  }
}
?>