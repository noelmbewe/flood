<?php

session_start();
ob_start();



include '../classes/classes.php';
include '../classes/Database.php';
$db = new Database();

  if (isset($_POST['submit'])) {
  $table = 'news_details1';
  $fields = array(
        "news_name" => $_POST['news_name'],
        "news_photo" => $_FILES['news_photo']['name'],
        "news_message" => $_POST['news_message'],
        "date" => date('Y-m-d'),

  );

  // looking for target folder for images
  $target = "news_photos/".basename($_FILES['news_photo']['name']);
  $wow = pathinfo($target,PATHINFO_EXTENSION);
  $filesize =  $_FILES['news_photo']['size'];

  $resultData = $db->save($table, $fields);

  if ($resultData && move_uploaded_file($_FILES['news_photo']['tmp_name'], $target)) {
$resizeObj = new Resize($target);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(480, 480, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target, 100);
     //redirecting to the home page
     header("location: ../post_new.php?error=none");
     $_SESSION['message2'] = "News Added Succefully";

       }else{
    
     header("location: ../post_new.php?error=none");
     $_SESSION['message2'] = "FAILED TO POST NEWS";
  }
}



if (isset($_POST['updatenewspic'])) {
$table ="news_details1";
$fields =array(

    "news_photo" => $_FILES['news_photo']['name'],
       
);
$where = array(
"id" => $_POST['id']

);



  // looking for target folder for images
  $target = "news_photos/".basename($_FILES['news_photo']['name']);

$updateData= $db->update($table,$fields,$where);
if($updateData && move_uploaded_file($_FILES['news_photo']['tmp_name'], $target)){
$resizeObj = new Resize($target);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(480, 480, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target, 100);
    //redirecting to the home page
     header("location: ../view_new.php?error=none");
     $_SESSION['message1'] = "updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../view_new.php?error=none");
     $_SESSION['message1'] = " updated";

}
}











if (isset($_POST['updatenews'])) {
$table ="news_details1";
$fields =array(

  "news_name" => $_POST['news_name'],
       // "news_photo" => $_FILES['news_photo']['name'],
        "news_message" => $_POST['news_message'],
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
     header("location: ../view_new.php?error=none");
     $_SESSION['message1'] = "updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../view_new.php?error=none");
     $_SESSION['message1'] = " updated";

}
}
?>