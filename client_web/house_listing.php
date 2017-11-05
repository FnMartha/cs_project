<?php
error_reporting(0);
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 11/5/17
 * Time: 11:12 AM
 */

require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\HouseController;
use App\Controllers\UserController;
$houses = HouseController::all();

?>
<?php if(sizeof($houses) > 0):?>
<?php foreach ($houses as $house):?>
<!-- Project One -->
      <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src='<?php echo !empty($house['image1'])? "../admin/pages/".$house['image1']: "http://placehold.it/700x300" ?>' style="height: 280px;!important; width: auto;"  alt="" >
<!--            <img class="img-fluid rounded mb-3 mb-md-0" src='../admin/pages/uploads/image_4.jpg'>-->


          </a>
        </div>
        <div class="col-md-5">
          <h3>House Located at <?php echo $house['location']?></h3>
          <p>This is A <?php echo $house['house_category'] ?> Owned by <?php echo UserController::getId($house['owned_by'])['username']?>
              <br>
              <small>Contact Info</small><br>
              <span>Phone Number <?php echo  UserController::getId($house['owned_by'])['phone_number']; ?></span><br>
              <span>Email <?php echo  UserController::getId($house['owned_by'])['email']; ?></span>
              <br>
              <small>status <?php echo $house['status'];?>
              lat <?php echo $house['lat']?> lng <?php echo $house['lng']?>
              </small>
          </p>
            <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="setValues('<?php echo $house['lat']?>', '<?php echo $house['lng']?>')">View On map</button>
        </div>
      </div>
        <hr>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Map View</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <input type="hidden" id="lat" name="lat">
                        <input type="hidden" id="lng" name="lng">
                    </form>

                    <div id="map" style="height:560px; width:auto;">

                    </div>
                </div>
            </div>
        </div>

        <script>

            function setValues(lat, lng) {
                document.getElementById("lat").value = lat;
                document.getElementById("lng").value = lng;



//        console.log({'lat12':document.getElementById("lat").value , 'lng12':document.getElementById("lng").value});
            }


        </script>
        <script>

            function initMap() {
                var place = {lat: <?php echo $house['lat'] ?>, lng: <?php echo $house['lng'] ?>};

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: place
                });
                var marker = new google.maps.Marker({
                    position: place,
                    map: map
                });

            }
        </script>

<?php endforeach; ?>

<?php else:?>
<div class="alert alert-info">
    <?php echo "No houses posted" ?>
</div>
<?php endif;?>



<script src="vendor/jquery/jquery.min.js"></script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC85mWXDYoa_O8r2NYK3ffyNZR2y2xYPxM&callback=initMap">
</script>






