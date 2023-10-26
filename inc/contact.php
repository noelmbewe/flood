<?php

session_start();
ob_start();


include '../classes/Database.php';
$db = new Database();

  if (isset($_POST['submit'])) {
  $table = 'contact_us';
  $fields = array(
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "subject" => $_POST['subject'],
        "message" => $_POST['message'],
        "date" => date('Y-m-d'),

  );

  $resultData = $db->save($table, $fields);

  if ($resultData) {

     //redirecting to the home page
     header("location: ../../Contact_us.php?error=none");
     $_SESSION['message21'] = "Message Sent";

       }else{
    echo "Not Saved";
  }
}
?>