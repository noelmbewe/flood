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
      <!-- Vectormap -->
    <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
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
         <?php  include("includes/adminmain.php"); ?>
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
    <script src="js/dlabnav-init.js"></script>
		
    <!-- Chart Morris plugin files -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morris/morris.min.js"></script>
		
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	
		<!-- Demo scripts -->
    <script src="js/dashboard/dashboard-2.js"></script>


    <!-- Vectormap -->
    <script src="vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="vendor/jqvmap/js/jquery.vmap.usa.js"></script>

    

    <!-- All init script -->
    <script src="js/plugins-init/jqvmap-init.js"></script>
	
	<!-- Svganimation scripts -->
    <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script>
  

		
	
</body>
</html>