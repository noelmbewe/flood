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
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>All Donors</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Donors</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">All Donors</a></li>
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
                                        <a href="add_donors.php" class="btn btn-primary">+ Add new</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example5" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Designation</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Joining Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td>
                                                        <td>Tiger Nixon</td>
                                                        <td>Clerk</td>
                                                        <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                                        <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                                        <td>#8901 Demo Road </td>
                                                        <td>2011/04/25</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                        </td>                                               
                                                    </tr>
                                                    <tr>
                                                        <td><img class="rounded-circle" width="35" src="images/profile/small/pic2.jpg" alt=""></td>
                                                        <td>Garrett Winters</td>
                                                        <td>Accountant</td>
                                                        <td><a href="javascript:void(0);"><strong>987 654 3210</strong></a></td>
                                                        <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                                        <td>#8901 Demo Road </td>
                                                        <td>2011/07/25</td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                        </td>
                                                    </tr>
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="grid-view" class="tab-pane fade col-lg-12">
                                <div class="row">
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
                                                        <img src="images/profile/small/pic2.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                                    </div>
                                                    <h3 class="my-4">Alexander</h3>
                                                    <ul class="list-group mb-3 list-group-flush">
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Designation :</span><strong>Clerk</strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                                    </ul>
                                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="staff-profile.html">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                        <img src="images/profile/small/pic3.jpg" width="100" class="img-fluid rounded-circle" alt="">
                                                    </div>
                                                    <h3 class="my-4">Elizabeth</h3>
                                                    <ul class="list-group mb-3 list-group-flush">
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Designation :</span><strong>Librarian</strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Phone No. :</span><strong>+01 123 456 7890</strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Email:</span><strong>info@example.com</strong></li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Address:</span><strong>#8901 Marmora Road</strong></li>
                                                    </ul>
                                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="staff-profile.html">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              
                            
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