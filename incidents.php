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
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
        .marker {
            background-color: green;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }
    </style>
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
  

          <?php  include("includes/agentnav.php"); ?>

       
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->


          <?php  include("includes/agentsidebar.php"); ?>
       
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                     <div class="row">
                  
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Malawi</h4>
                            </div>
                            <div class="card-body">
                                <div  style="height: 650px;">
                                    
                                  <?php
    // MySQL connection configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "floodmanagement";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserting data into the database
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];

        // Prepare the SQL statement
        $sql = "INSERT INTO locations (name, latitude, longitude) VALUES ('$name', '$latitude', '$longitude')";

        if ($conn->query($sql) === TRUE) {
            echo "Location added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Fetching data from the database
    $sql = "SELECT * FROM locations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Displaying the map
        echo "<div id='map'></div>";

        // Generate JavaScript code to display markers and info windows
        echo "<script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 0, lng: 0},
                        zoom: 2
                    });";

        // Iterate over the fetched locations and create markers and info windows
        while ($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $latitude = $row["latitude"];
            $longitude = $row["longitude"];

            // Generate JavaScript code for each marker and info window
             echo "var location = {lat: $latitude, lng: $longitude};
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: '$name'
            });

            var circle = new google.maps.Circle({
                map: map,
                radius: 100, // Specify the radius of the circle in meters
                fillColor: 'green',
                fillOpacity: 0.35,
                strokeWeight: 0,
                center: location
            });

            var content = '<div><h3>' + '$name' + '</h3></div>';

            var infoWindow = new google.maps.InfoWindow({
                content: content
            });

            marker.addListener('mouseover', function() {
                infoWindow.open(map, marker);
            });

            marker.addListener('mouseout', function() {
                infoWindow.close();
            });";
        }

        echo "}
            </script>
        <script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAsTvi2dmx_Bnel6F0POzTg6-TaQ16JeDs&amp;callback=initMap'type='text/javascript'></script>";
    } else {
        echo "No locations found.";
    }

    // Close the database connection
    $conn->close();
    ?>




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