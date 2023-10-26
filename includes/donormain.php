   <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row">
					<div class="col-xl-12 col-xxl-6 col-sm-12">
						<div class="row">
							
							<div class="col-xl-4 col-xxl-6 col-sm-6">
								<div class="widget-stat card">
									<div class="card-body">
										<h4 class="card-title">Total cases</h4>
										<h3>25</h3>
										<div class="progress mb-2">
											<div class="progress-bar progress-animated bg-warning" style="width: 20%"></div>
										</div>
									
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-xxl-6 col-sm-6">
								<div class="widget-stat card">
									<div class="card-body">
										<h4 class="card-title">Total deaths</h4>
										<h3>28</h3>
										<div class="progress mb-2">
											<div class="progress-bar progress-animated bg-red" style="width: 36%"></div>
										</div>
									
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-xxl-6 col-sm-6">
								<div class="widget-stat card">
									<div class="card-body">
										<h4 class="card-title">Total survivers</h4>
										<h3>251</h3>
										<div class="progress mb-2">
											<div class="progress-bar progress-animated bg-success" style="width: 60%"></div>
										</div>
									
									</div>
								</div>
							</div>
						</div>
                    </div>					
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Floods Report</h3>
							</div>
							<div class="card-body">
								 <div id="morris_bar_2" class="morris_chart_height"></div>
							</div>
						</div>
					</div>

                 
				</div>




					   <!-- Vectormap -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Malawi</h4>
                            </div>
                            <div class="card-body">
                                <div  style="height: 450px;">
                                	
                                	   <div class="row">
                  
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Malawi</h4>
                            </div>
                            <div class="card-body">
                                <div  style="height: 450px;">
                                	
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