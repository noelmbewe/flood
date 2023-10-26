
<?php

session_start();
ob_start();


include '../classes/Database.php';

include '../classes/classes.php';
$db = new Database();

  if (isset($_POST['submit'])) {
  
    
  $table = 'department_details';
  $fields = array(

        "department_name" => $_POST['department_name'],
        "department_image" => $_FILES['department_image']['name'],
        "department_message" => $_POST['department_message'],
         "date" => date('Y-m-d'),

  );



    $department_image = $_FILES['department_image']['name'];
       


  // looking for target folder for images
  $target = "department_photos/".basename($_FILES['department_image']['name']);
 



  $resultData = $db->save($table, $fields);

  if ($resultData && move_uploaded_file($_FILES['department_image']['tmp_name'], $target)) {
 
 $resizeObj = new Resize($target);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(480, 480, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target, 100);

    //$target_fil = date('dmYHis').str_replace(" ", "", basename($image["name"]));
    //$target_file = $target_dir . $target_fil;


     //redirecting to the home page
     header("location: ../view_depart.php?error=none");
     $_SESSION['message1'] = " Added Succefully";

       }else{
    echo "Not Saved";
  }
}

if (isset($_POST['updatedeptphoto'])) {
$table ="department_details";
$fields =array(

        "department_image" => $_FILES['department_image']['name'],


);
$where = array(
"DepT_id" => $_POST['id']

);



    $department_image= $_FILES['department_image']['name'];
  // looking for target folder for 
  $target = "department_photos/".basename($_FILES['department_image']['name']);
//move_uploaded_file($_FILES['department_image']['tmp_name'], $target);

    //$target_fil = date('dmYHis').str_replace(" ", "", basename($image["name"]));
    //$target_file = $target_dir . $target_fil;

$updateData= $db->update($table,$fields,$where);
if($updateData && move_uploaded_file($_FILES['department_image']['tmp_name'], $target)){
 
 $resizeObj = new Resize($target);
    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage(480, 480, 'crop');
    // *** 3) Save image ('image-name', 'quality [int]')
    $resizeObj -> saveImage($target, 100);
    //redirecting to the home page
     header("location: ../view_depart.php?error=none");
     $_SESSION['message1'] = "updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../view_depart.php?error=none");
     $_SESSION['message1'] = " updated";

}
}


















if (isset($_POST['updatedept'])) {
$table ="department_details";
$fields =array(

        "department_name" => $_POST['department_name'],
        
        "department_message" => $_POST['department_message'],
         "date" => date('Y-m-d'),

);
$where = array(
"DepT_id" => $_POST['id']

);



    //$department_image= $_FILES['department_image']['name'];
  // looking for target folder for images
  /*$target = "department_photos/".basename($_FILES['department_image']['name']);
move_uploaded_file($_FILES['department_image']['tmp_name'], $target);*/

$updateData= $db->update($table,$fields,$where);
if($updateData){

    //redirecting to the home page
     header("location: ../view_depart.php?error=none");
     $_SESSION['message1'] = "updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../view_depart.php?error=none");
     $_SESSION['message1'] = " updated";

}
}

if (isset($_GET['deletedept'])) {

  $delete_id = $_GET['deletedept'];
  $table = "department_details";
  $where = array(
     
     "DepT_id"=>$delete_id 

  );
  $delete  = $db->delete($table,$where);
  if ($delete) {
   
    //redirecting to the home page
     header("location: ../view_depart.php?error=none");
     $_SESSION['message1'] = "deleted Succefully";
  }
  else{

    //redirecting to the home page
     header("location: ../view_depart.php?error=none");
     $_SESSION['message1'] = " failed";

  }

}



?>