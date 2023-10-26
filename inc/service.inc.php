<?php

session_start();
ob_start();




include '../classes/classes.php';
include '../classes/Database.php';
$db = new Database();

  if (isset($_POST['submit'])) {
  $table = 'serivce_details';
  $fields = array(
        "department" => $_POST['department'],
        "service_name" => $_POST['service_name'],
    "service_photo" => $_FILES['service_photo']['name'],
        "service_message" => $_POST['service_message'],
        "date" => date('Y-m-d'),

  );

  // looking for target folder for images
  $target = "service_photos/".basename($_FILES['service_photo']['name']);
  $wow = pathinfo($target,PATHINFO_EXTENSION);
  $filesize =  $_FILES['service_photo']['size'];

  $resultData = $db->save($table, $fields);

  if ($resultData&& move_uploaded_file($_FILES['service_photo']['tmp_name'], $target)) {
 
 $resizeObj = new Resize($target);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(480, 480, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target, 100);
     //redirecting to the home page
     header("location: ../post_services.php?error=none");
     $_SESSION['message4'] = "Service added Succefully";

       }else{
    echo "Not Saved";
  }
}











if (isset($_POST['updateservpic'])) {
$table ="serivce_details";
$fields =array(

       "service_photo" => $_FILES['service_photo']['name'],
    
);
$where = array(
"id" => $_POST['id']

);



  $target = "service_photos/".basename($_FILES['service_photo']['name']);
 

    //$department_image= $_FILES['department_image']['name'];
  // looking for target folder for images
  /*$target = "department_photos/".basename($_FILES['department_image']['name']);
move_uploaded_file($_FILES['department_image']['tmp_name'], $target);*/

$updateData= $db->update($table,$fields,$where);
if($updateData && move_uploaded_file($_FILES['service_photo']['tmp_name'], $target)){

    //redirecting to the home page
   $resizeObj = new Resize($target);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(480, 480, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target, 100);
     header("location: ../view_services.php?error=none");
     $_SESSION['message1'] = "updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../view_services.php?error=none");
     $_SESSION['message1'] = " updated";

}
}















if (isset($_POST['updateserv'])) {
$table ="serivce_details";
$fields =array(

"department" => $_POST['department'],
        "service_name" => $_POST['service_name'],
       // "service_photo" => $_FILES['service_photo']['name'],
        "service_message" => $_POST['service_message'],
        "date" => date('Y-m-d'),

);
$where = array(
"id" => $_POST['id']

);



    //$department_image= $_FILES['department_image']['name'];
  // looking for target folder for images
  /*$target = "department_photos/".basename($_FILES['department_image']['name']);
move_uploaded_file($_FILES['department_image']['tmp_name'], $target);*/

$updateData= $db->update($table,$fields,$where);
if($updateData){

    //redirecting to the home page
 
     header("location: ../view_services.php?error=none");
     $_SESSION['message1'] = "updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../view_services.php?error=none");
     $_SESSION['message1'] = " updated";

}
}
?>