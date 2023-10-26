   <?php

session_start();

include_once "classes/dbh.classes.php";
include_once "classes/Database.php";
$db = new Database();

?>



    <!DOCTYPE html>
    <html>
    <head>
    	<title></title>
    </head>
    <body>
    	                            <?php
if (isset($_GET['edit_id'])) {
 
 $id =$_GET['edit_id'];
 $where = array(

"id" => $id

   
 );
 $userData =$db->selectWhere('agents',$where);
 foreach ($userData as $key => $value) {
 
?>

    <input type="text" value="<?php echo $value['firstname']; ?>" name="firstname" class="form-control">
    <?php
}

}


    ?>
    </body>
    </html>