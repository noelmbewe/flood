<?php
//error_reporting(0);
//session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dlhos061";

// Create connection

$conn =  mysqli_connect($servername,$username,$password,"$dbname");

if (!$conn) {
  
  die("Could Not Connect:" .mysqli_connect_error());
}



$name = "";
$name1 = "";
$name2 = "";
$name3 = "";
$address = "";
$mobile_number = "";
$id = 0;
$edit_state = false;


 
    $image ="";
   // $image = $_FILES['image']['name'];

     $image1 ="";
  //  $image1 = $_FILES['image1']['name'];

     $image2 ="";
  //  $image2 = $_FILES['image2']['name'];

     $image3 ="";
  //  $image3 = $_FILES['image3']['name'];

              $title= "";
             
              $phonenumber = "";
              $message = "";
              $location = "";
              $price = "";
              $status = "";
$tip= "";
$username = "";

         $firstname= "";
         $lastname= "";
         $password = "";
         $email = "";



//------------------------------------------dlhosp--------------------------------------------------------------


           $clinic_name= "";
              $clinic_image= "";
            $profile = "";
            $message = "";
             $Datetime = "";

             


//--------------------------------------dlhosp end--------------------------------------------------------------


//------------------------------------------agents--------------------------------------------------------------


// For adding agents
if (isset($_POST['agents'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $phonenumber = $_POST['phonenumber'];

 $sql = "INSERT INTO agents (firstname,lastname,email,phonenumber,username,password,location) VALUES ('$firstname','$lastname','$email','$phonenumber','$username','$password','$location')";
 if (mysqli_query($conn, $sql)) { 
  $_SESSION['message'] = "Data Saved Successfully";
    header("Location: manageagents.php");
   } else {
    mysqli_close($conn);
   }
   
}


//update agents

if (isset($_POST['updateagent'])) {
  $id = $_POST['id'];

$firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $phonenumber = $_POST['phonenumber'];
  
                


  mysqli_query($conn, "UPDATE agents SET firstname='$firstname', lastname='$lastname', email='$email', phonenumber='$phonenumber', location='$location', username='$username', password='$password'WHERE id=$id");
  $_SESSION['message'] = " Updated Successfully";
  header('location: manageagents.php');
}


// For deleting agents

if (isset($_GET['deleteangent'])) {
  $id = $_GET['deleteangent'];
  mysqli_query($conn, "DELETE FROM agents WHERE id=$id");
  $_SESSION['message'] = " Deleted Successfully";
  header('location:manageagents.php');
}




//------------------------------------------farmers--------------------------------------------------------------


// For adding farmers
if (isset($_POST['farmers'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $phonenumber = $_POST['phonenumber'];

 $sql = "INSERT INTO farmers (firstname,lastname,email,phonenumber,username,password,location) VALUES ('$firstname','$lastname','$email','$phonenumber','$username','$password','$location')";
 if (mysqli_query($conn, $sql)) { 
  $_SESSION['message'] = "Data Saved Successfully";
    header("Location: managefarmer.php");
   } else {
    mysqli_close($conn);
   }
   
}


//update farmers

if (isset($_POST['updatefarmers'])) {
  $id = $_POST['id'];

$firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $phonenumber = $_POST['phonenumber'];
  
                


  mysqli_query($conn, "UPDATE farmers SET firstname='$firstname', lastname='$lastname', email='$email', phonenumber='$phonenumber', location='$location', username='$username', password='$password'WHERE id=$id");
  $_SESSION['message'] = " Updated Successfully";
  header('location: managefarmer.php');
}


//confirm farmers

if (isset($_POST['confirm'])) {
  $id = $_POST['id'];

$status= 1;
 
  
                


  mysqli_query($conn, "UPDATE farmers SET status='$status' WHERE id=$id");
  $_SESSION['message'] = " confirmed Successfully";
  header('location: confirm.php');
}



// For deleting farmers

if (isset($_GET['deletefarmers'])) {
  $id = $_GET['deletefarmers'];
  mysqli_query($conn, "DELETE FROM farmers WHERE id=$id");
  $_SESSION['message'] = " Deleted Successfully";
  header('location:managefarmer.php');
}

//------------------------------------------tips--------------------------------------------------------------


// add tip
if (isset($_POST['tip'])) {

  
          $tip= $_POST['tip'];
          $username= $_POST['username'];
        
         
          
           $image = $_FILES['image']['name'];

  
    
    $target = "img/".basename($_FILES['image']['name']);
   move_uploaded_file($_FILES['image']['tmp_name'], $target);


 $sql = "INSERT INTO tips (username,tip,image) VALUES ('$username','$tip','$image')";
    $result = mysqli_query($conn, $sql);

 if($result  && move_uploaded_file($_FILES['image']['tmp_name'], $target)){

          
  $_SESSION['message'] = "POSTED SUCCESSFULLY";
    header("Location: manegetips.php");

   }else{
           echo "Error".mysqli_error($conn);
   }
   
}

//update tips

if (isset($_POST['updatetip'])) {
  $id = $_POST['id'];

          $tip= $_POST['tip'];
              $username= $_POST['username'];
            $image = $_POST['image'];

  
    $image = $_FILES['image']['name'];

    
    
    $target = "img/tips/".basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $target);
                


  mysqli_query($conn, "UPDATE tips SET tip='$tip', username='$username', image='$image'WHERE id=$id");
  $_SESSION['message'] = " Updated Successfully";
  header('location: manegetips.php');
}


// For deleting tips

if (isset($_GET['deletetip'])) {
  $id = $_GET['deletetip'];
  mysqli_query($conn, "DELETE FROM tips WHERE id=$id");
  $_SESSION['message'] = " Deleted Successfully";
  header('location:manegetips.php');
}



// add advert
if (isset($_POST['advertise'])) {

  
          $title= $_POST['title'];
              $image= $_POST['image'];
            $phonenumber = $_POST['phonenumber'];
            $message = $_POST['message'];
             $price = $_POST['price'];
               $location = $_POST['location'];
                


 $sql = "INSERT INTO adverts (title,image,phonenumber,message,price,location) VALUES ('$title','$image','$phonenumber','$message','$price','$location')";
 if (mysqli_query($conn, $sql)) { 
  $_SESSION['message'] = "POSTED SUCCESSFULLY";
    header("Location: manegeadverts.php");
   } else {
    mysqli_close($conn);
   }
   
}

//update advert

if (isset($_POST['updateadvert'])) {
  $id = $_POST['id'];


  
      $title= $_POST['title'];
              $image= $_POST['image'];
            $phonenumber = $_POST['phonenumber'];
            $message = $_POST['message'];
             $price = $_POST['price'];
               $location = $_POST['location'];
                

    
    $image = $_FILES['image']['name'];

    
    $target = "img/adverts/".basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $target);

  mysqli_query($conn, "UPDATE adverts SET title='$title', image='$image', phonenumber='$phonenumber', message='$message', price='$price', location='$location'  WHERE id=$id");
  $_SESSION['message'] = " Updated Successfully";
  header('location: manegeadverts.php');
}



// For deleting adverts

if (isset($_GET['deleteadverts'])) {
  $id = $_GET['deleteadverts'];
  mysqli_query($conn, "DELETE FROM adverts WHERE id=$id");
  $_SESSION['message'] = " Deleted Successfully";
  header('location:manegeadverts.php');
}






         $firstname= "";
              $lastname= "";
         
            $email = "";
         
             











?>