<?php

session_start();
ob_start();

include '../classes/classes.php';

include '../classes/Database.php';
$db = new Database();

  if (isset($_POST['submit'])) {
  $table = 'gallery';
  $fields = array(
        "title" => $_POST['title'],
        "gallery_photo" => $_FILES['gallery_photo']['name'],
        "imagesect" => $_POST['imagesect'],
        "date" => date('Y-m-d'),

  );




  // looking for target folder for images
  $target = "gallery/".basename($_FILES['gallery_photo']['name']);
  $wow = pathinfo($target,PATHINFO_EXTENSION);
  $filesize =  $_FILES['gallery_photo']['size'];

  $resultData = $db->save($table, $fields);

  if ($resultData && move_uploaded_file($_FILES['gallery_photo']['tmp_name'], $target)) {

    $resizeObj = new Resize($target);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(480, 480, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target, 100);
     //redirecting to the home page
     header("location: ../post_gallery.php?error=none");
     $_SESSION['message3'] = "Photo Added Succefully";

       }else{
  
     header("location: ../post_gallery.php?error=failed");
     $_SESSION['message3'] = "Failed to Upload please choose a good quality photo ";
  }
}




if (isset($_POST['updategallphoto'])) {
$table ="gallery";
$fields =array(

     "gallery_photo" => $_FILES['gallery_photo']['name'],


);
$where = array(
"id" => $_POST['id']

);


 
  $target = "gallery/".basename($_FILES['gallery_photo']['name']);
  $wow = pathinfo($target,PATHINFO_EXTENSION);
  $filesize =  $_FILES['gallery_photo']['size'];

$updateData= $db->update($table,$fields,$where);
if($updateData && move_uploaded_file($_FILES['gallery_photo']['tmp_name'], $target)){
 
 $resizeObj = new Resize($target);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(480, 480, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target, 100);
    //redirecting to the home page
     header("location: ../post_gallery.php?error=none");
     $_SESSION['message1'] = "Updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../post_gallery.php?error=none");
     $_SESSION['message1'] = "Failed To Updated";

}
}







if (isset($_POST['updategallery'])) {
$table ="gallery";
$fields =array(

 "title" => $_POST['title'],
        "imagesect" => $_POST['imagesect'],
        "date" => date('Y-m-d'),



);
$where = array(
"id" => $_POST['id']

);


 

$updateData= $db->update($table,$fields,$where);
if($updateData ){
 

    //redirecting to the home page
     header("location: ../view_gallery.php?error=none");
     $_SESSION['message1'] = "Updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../view_gallery.php?error=none");
     $_SESSION['message1'] = "Failed To Updated";

}
}















?>