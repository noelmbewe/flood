<?php

session_start();
include_once "classes/dbh.classes.php";
include_once "classes/Database.php";
$db = new Database();
/*  if(!isset($_SESSION['userid'])){
    header("location:logout.php");
  }*/


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
        <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
                    <div class="col-sm-2 p-md-0">
                        <div class="welcome-text">
                            <h4>All   Agents</h4>
                        </div>
                    </div>
                    <div class="col-sm-4 p-md-0">
                        <div class="welcome-text">
                                  <?php
                        if (isset($_SESSION['message2'])) {
                          echo "<h4 >".$_SESSION['message2']."</h4>";
                          unset($_SESSION['message2']);
                        }
                         if (isset($_SESSION['message3'])) {
                          echo "<h4 >".$_SESSION['message3']."</h4>";
                          unset($_SESSION['message3']);
                        }
                    ?>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">agents</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">All agents</a></li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills mb-3">
                            <li class="nav-item"><a href="#list-view" data-toggle="tab" class="nav-link btn-primary mr-1 show active">List View</a></li>
                            <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid View</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="row tab-content">
                            <div id="list-view" class="tab-pane fade active show col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">..  </h4>
                                        <a href="add_agents.php" class="btn btn-primary">+ Add new</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example5" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                         <th>#</th>
                                                        <th></th>
                                                        <th>Firstname</th>
                                                        <th>Lastname</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>Gender</th>
                                                        <th>Address</th>
                                                        <th>Joining Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                     <?php

                              $list = $db->viewlimit2('agents');
                              $count = 0;
                             foreach ($list as $key => $value) {
                              $count+=1;
     
                           ?>
                                                    <tr>
                                                        <td> <?php  echo $count; ?></td>
                                                        <td><img class="rounded-circle" width="35" src='imgs/<?php echo $value['image']; ?>' alt=""></td>
                                                        <td><?php echo $value['firstname']; ?></td>
                                                        <td><?php echo $value['lastname']; ?></td>
                                                       
                                                        <td><a href='<?php echo $value['email']; ?>'><strong><?php echo $value['email']; ?></strong></a></td>
                                                        <td><a href="javascript:void(0);"><strong><?php echo $value['phonenumber']; ?></strong></a></td>
                                                        <td> <?php echo $value['gender']; ?></td>
                                                        <td><?php echo $value['address']; ?></td>
                                                        <td><?php echo $value['date']; ?></td>
                                                        <td>
                                                            <a href="updateagents.php?edit_id=<?php echo $value['id']; ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>

 <a  class="btn btn-sm btn-danger" onClick="javascript:return confirm('are sure you want to delete <?php echo $value['firstname']; ?>');" href='inc/deleteagent.inc.php?delete_id=<?php echo $value['id']; ?>'><i class="la la-trash-o"></i></a>
                                                        </td>                                               
                                                    </tr>
                                                  <?php } ?>
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="grid-view" class="tab-pane fade col-lg-12">
                                <div class="row">
                                                        <?php

                              $list = $db->viewlimit2('agents');
                              $count = 0;
                             foreach ($list as $key => $value) {
                              $count+=1;
     
                           ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-profile">
                                            <div class="card-header justify-content-end pb-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                        <span class="dropdown-dots fs--1"></span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2">
                                                <div class="text-center">
                                                    <div class="profile-photo">
                                                        <img src='imgs/<?php echo $value['image']; ?>' width="100" class="img-fluid rounded-circle" alt="">
                                                    </div>
                                                    <h3 class="my-4"><?php echo $value['firstname']." ". $value['lastname']; ?> </h3>
                                                    <ul class="list-group mb-3 list-group-flush">
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Date joined :</span><strong><?php echo $value['date']; ?></strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Phone No. :</span><strong><?php echo $value['phonenumber']; ?></strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Email:</span><strong><?php echo $value['email']; ?></strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Address:</span><strong><?php echo $value['address']; ?></strong></li>
                                                    </ul>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                                  
                            
                                   
                                </div>
                            </div>
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

    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
	
	<!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
  

		
	
</body>
</html>