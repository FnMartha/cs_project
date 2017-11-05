<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 25/09/17
 * Time: 12:18
 */

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\UserController;
use App\Models\House;
use App\Controllers\HouseController;

$users = UserController::all();

$successMsg = '';
$errorMsg = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['owned_by']) and isset($_POST['location']) and isset($_POST['min_price'])
        and isset($_POST['house_category'])
    ) {

        $errors = array();
        $uploadedFiles = array();
        $extension = array("jpeg","jpg","png","gif");
        $bytes = 1024;
        $KB = 1024;
        $totalBytes = ($bytes * $KB) * 5;
        $UploadFolder = "uploads";

        $counter = 0;
        $filepaths = array();

            foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                $temp = $_FILES["files"]["tmp_name"][$key];
                $name = $_FILES["files"]["name"][$key];

                if (empty($temp)) {
                    break;
                }

                $counter++;
                $UploadOk = true;

                if ($_FILES["files"]["size"][$key] > $totalBytes) {
                    $UploadOk = false;
                    array_push($errors, $name . " file size is larger than the 5 MB.");
                }

                $ext = pathinfo($name, PATHINFO_EXTENSION);
                if (in_array($ext, $extension) == false) {
                    $UploadOk = false;
                    array_push($errors, $name . " is invalid file type.");
                }

                if (file_exists($UploadFolder . "/" . $name) == true) {
                    $UploadOk = false;
                    array_push($errors, $name . " file is already exist.");
                }

                if ($UploadOk == true) {
                    move_uploaded_file($temp, $UploadFolder . "/" . $name);
                    array_push($uploadedFiles, $name);
                    array_push($filepaths, $UploadFolder . "/" . $name);


                }
            }

        if($counter>0){
            if(count($errors)>0)
            {
                echo "<b>Errors:</b>";
                echo "<br/><ul>";
                foreach($errors as $error)
                {
                    echo "<li>".$error."</li>";
                }
                echo "</ul><br/>";
            }

            if(count($uploadedFiles)>0){

                echo count($uploadedFiles)." file(s) are successfully uploaded.";
            }



        }
        else{
            echo "Please, Select file(s) to upload.";
        }

        //create an instance of the house model class
            $house = new House();

            //set the house object property value with the respective
            //setters

            $house->setOwnedBy($_POST['owned_by']);
            $house->setHouseCategory($_POST['house_category']);
            $house->setLocation($_POST['location']);
            $house->setMinPrice($_POST['min_price']);
            $house->setMaxPrice(null);
            $house->setImageOne(isset($filepaths[0])? $filepaths[0]: null);
            $house->setImageTwo(isset($filepaths[1])? $filepaths[1]: null);
            $house->setImageThree(isset($filepaths[2])? $filepaths[2]: null);
            $house->setImageFour(isset($filepaths[3])? $filepaths[3]: null);
            $house->setImageFive(isset($filepaths[4])? $filepaths[4]: null);
            $house->setStatus('available');
            $house->setLat($_POST['lat']);
            $house->setLng($_POST['lng']);


            //create an instance for the house controller

            $houseCtrl = new HouseController();
            $created = $houseCtrl->create($house);

            if ($created === TRUE) {
                $successMsg .= "House Added successfully";
                $filepaths = [];
            } else {
                $errorMsg .= $created['error'];
            }


        } else {
            $errorMsg .= 'all fields required';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Users</title>

    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }


        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
        #target {
            width: 345px;
        }

        </style>

</head>
<body>
<div id="wrapper">
    <?php include_once 'right_menu.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Houses</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Register houses
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php
                        if ($successMsg != '' and $errorMsg == '') {
                            ?>
                            <div class="alert alert-success">
                                <?php echo $successMsg; ?>
                                <br>
                                <a href="houses.php" class="btn-link">Go to houses list</a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $errorMsg ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <h6><span style="color: green;">Current Selected location:</span></h6>
                            <p id="selected_location"></p>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
                                  enctype="multipart/form-data">
                                <label for="house_category">House Type</label>
                                <select id="house_category" name="house_category" class="form-control">
                                    <option value="1_BEDROOM">One BedRoom</option>
                                    <option value="2_BEDROOM">Two BedRoom</option>
                                    <option value="3_BEDROOM">Three BedRoom</option>
                                    <option value="BEDSEATER">Bed-Seater</option>
                                    <option value="SINGLE_ROOM">Single Room</option>
                                    <option value="DOUBLE_ROOM">Double Room</option>
                                </select>

                                <input type="hidden" id="location" name="location" class="form-control" required>
                                <input type="hidden" id="lat" name="lat">
                                <input type="hidden" id="lng" name="lng">

                                <label for="min_price">Price</label>
                                <input type="number" id="min_price" name="min_price" class="form-control" required>


                            <br>
                                <label>Select image(s) Max 5 images:</label>
                                <input type="file" name="files[]" multiple="multiple" />

                                <label for="owned_by"> Owned By</label>
                                <select id="owned_by" class="form-control" name="owned_by">
                                    <option>Select Owner Here</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user['id'] ?>"><?php echo $user['username'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <input type="submit" value="submit" name="submit" class="btn btn-primary btn-block"
                                       style="margin: 10px;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <input id="pac-input" class="controls" type="text" placeholder="Search your location here"
                       style="margin-top: 10px;">
                <div id="map" style="height: 520px; width: auto">
                </div>
            </div>
        </div>
    </div>

    <script>

        var marker=false;
        var map;
        function initAutocomplete() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -1.2885962273241198, lng: 36.823039054870605},
                zoom: 13,
                mapTypeId: 'roadmap'
                // mapTypeId: 'hybrid'
            });



            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
                });
            }


            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });

            //my custom
            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                           document.getElementById('selected_location').innerHTML = results[0].formatted_address;
//                            document.getElementById('location_text').textContent = results[0].formatted_address;
                            console.log(results[0].geometry.location.lat());
                            console.log(results[0].geometry.location.lng());

                            document.getElementById('lat').value = results[0].geometry.location.lat(); //latitude
                            document.getElementById('lng').value = results[0].geometry.location.lng(); //longitude
                            document.getElementById('location').value = results[0].formatted_address

                        }
                    }
                });
            });
            //end of my custom


            var marker = false;

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function(event) {
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker, 'dragend', function(event){

                        var currentLocation = marker.getPosition();
                        //Add lat and lng values to a field that we can save.
                        // document.getElementById('lat').value = currentLocation.lat(); //latitude
                        // document.getElementById('lng').value = currentLocation.lng(); //longitude
                    });
                } else{
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                //markerLocation();

                var currentLocation = marker.getPosition();
                //Add lat and lng values to a field that we can save.
//                document.getElementById('lat').value = currentLocation.lat(); //latitude
//                document.getElementById('lng').value = currentLocation.lng(); //longitude

                //console.log("lat "+currentLocation.lat());
                //console.log("lng  "+currentLocation.lng());
            });


        }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC85mWXDYoa_O8r2NYK3ffyNZR2y2xYPxM&libraries=places&callback=initAutocomplete"
            async defer></script>

    <?php include_once 'footer.php' ?>

</body>
</html>

