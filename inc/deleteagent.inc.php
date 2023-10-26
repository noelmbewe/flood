<?php

session_start();
ob_start();
include '../classes/Database.php';
$db = new Database();


if (isset($_GET['delete_id'])) {
   
   $delete_id = $_GET['delete_id'];
   $table = "agents";
   $where = array(
      
      "id" => $delete_id
   );
   $delete = $db->delete($table, $where);
   if ($delete) {
      
      $_SESSION['message3'] = "Deleted Succeffully";
      header("location: ../view_agents.php?error=none");
   	
   }else{

      $_SESSION['message3'] = " Failed Deleted ";
      header("location: ../view_agents.php?error=Failed");
   	
   }

}

?>