<?php

session_start();

include_once "classes/dbh.classes.php";
include_once "classes/Database.php";
$db = new Database();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>FMS</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/flood.ico">
	<link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/skin.css">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
  

          <?php  include("includes/adminnav.php"); ?>

       
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->


          <?php  include("includes/adminsidebar.php"); ?>
       
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
       
        
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    
                <div class="row page-titles mx-0">
                    <div class="col-sm-4 p-md-0">
                        <div class="welcome-text">
                            <h4>Edit Agents</h4>
                        </div>
                    </div>
                      <div class="col-sm-2 p-md-0">
                        <div class="welcome-text">

                            <?php
                        if (isset($_SESSION['message11'])) {
                          echo "<h4 >".$_SESSION['message11']."</h4>";
                          unset($_SESSION['message11']);
                        }
                    ?> 

                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Agents</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Agents</a></li>
                        </ol>
                    </div>
                </div>
                



                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                            
                            </div>
                            <?php
if (isset($_GET['edit_id'])) {
 
 $id =$_GET['edit_id'];
 $where = array(

"id" => $id

   
 );
 $userData =$db->selectWhere('agents',$where);
 foreach ($userData as $key => $value) {
 
?>

                            <div class="card-body">
                                <form action="inc/updateagent.inc.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                         <input type="hidden" name="id"value="<?php echo $value['id']; ?>"class="form-control">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">First Name</label>
                                                <input type="text" value="<?php echo $value['firstname']; ?>" name="firstname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" value="<?php echo $value['lastname']; ?>" name="lastname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Email Here</label>
                                                <input type="text" value="<?php echo $value['email']; ?>" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="text" value="<?php echo $value['phonenumber']; ?>" name="phonenumber" class="form-control">
                                            </div>
                                        </div>
                                        
                                       
                                       
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Gender</label>
                                                <select class="form-control" name="gender">
                                                     <option value="<?php echo $value['gender']; ?>" ><?php echo $value['gender']; ?></option>
                                                    <option value="Gender">Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                   
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <textarea  class="form-control" rows="5" name="address"><?php echo $value['address']; ?></textarea>
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" name="updateagent" class="btn btn-primary">Submit</button>
                                            <a href="view_agents.php" class="btn btn-light">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                              <?php
                          }

        }?>
                        </div>
                    </div>
                </div>

          
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
         <?php  include("includes/footer.php"); ?>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="js/custom.min.js"></script>
		
    <!-- Chart Morris plugin files -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morris/morris.min.js"></script>
		
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	
		<!-- Demo scripts -->
    <script src="js/dashboard/dashboard-2.js"></script>
	
	<!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
  

		
	
</body>
</html>