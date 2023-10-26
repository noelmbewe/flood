<?php

session_start();
ob_start();


include '../classes/Database.php';
$db = new Database();

  if (isset($_POST['submit'])) {
  $table = 'department_details';
  $fields = array(
        "department_name" => $_POST['department_name'],
        "department_image" => $_FILES['department_image']['name'],
        "department_message" => $_POST['department_message'],
        "date" => date('Y-m-d'),

  );

  // looking for target folder for images
  $target = "department_photos/".basename($_FILES['department_image']['name']);
  $wow = pathinfo($target,PATHINFO_EXTENSION);
  $filesize =  $_FILES['department_image']['size'];

  $resultData = $db->save($table, $fields);

  if ($resultData && move_uploaded_file($_FILES['department_image']['tmp_name'], $target)) {
         
         if($filesize && $filesize1>2000){
 //image path
    $target_file ="clinics_photos/".$clinic_image;
    //$target_fil = date('dmYHis').str_replace(" ", "", basename($image["name"]));
    //$target_file = $target_dir . $target_fil;

    $resizeObj = new Resize($target_file);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(670, 505, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target_file, 100);



    //image path
    $target_file ="clinics_photos/".$profile;
    //$target_fil = date('dmYHis').str_replace(" ", "", basename($image["name"]));
    //$target_file = $target_dir . $target_fil;

    $resizeObj = new Resize($target_file);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(670, 505, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target_file, 100);

     //redirecting to the home page
     header("location: ../special_clinics.php?error=none");
     $_SESSION['message1'] = "Clinic Added Succefully";

       }else{
    echo "Not Saved";
  


         }
     //redirecting to the home page
     header("location: ../post_department.php?error=none");
     $_SESSION['message1'] = "Department Added Succefully";

       }else{
    echo "Not Saved";
  }
}
?>