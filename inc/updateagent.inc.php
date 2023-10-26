
<?php

session_start();
ob_start();

 
include '../classes/Database.php';
$db = new Database();

if (isset($_POST['updateagent'])) {
$table ="agents";
$fields =array(


        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "email" => $_POST['email'],
        "phonenumber" => $_POST['phonenumber'],
        "gender" => $_POST['gender'],
        "address" => $_POST['address'],
      
      


);
$where = array(
"id" => $_POST['id']

);




$updateData= $db->update($table,$fields,$where);
if($updateData){

    //redirecting to the home page
     header("location: ../view_agents.php?error=none");
     $_SESSION['message2'] = " updated Succefully";


}
else{

    //redirecting to the home page
     header("location: ../view_agents.php?error=failed");
     $_SESSION['message2'] = " update failed";

}


}

?>
