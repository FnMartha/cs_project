<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 25/09/17
 * Time: 12:18
 */

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\UserController;
use App\ServiceProvider\FileUploader;
use App\Models\House;
use App\Controllers\HouseController;

$users = UserController::all();

$successMsg = '';
$errorMsg = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['owned_by']) and isset($_POST['location']) and isset($_POST['min_price'])
        and isset($_POST['max_price']) and isset($_POST['house_category'])
    ) {

//    $uploader1 = new FileUploader('image');
//    $target_dir = 'uploads/';
//    $formName1 = $_FILES['image1'];
//
//    if ($uploader1->uploadFile($target_dir, $formName1)
//    )
//    {
        //get the file paths for each image
//        $image1_url = $uploader1->getFilePath();
//        $image2_url = $uploader2->getFilePath();
//        $image3_url = $uploader3->getFilePath();
//        $image4_url = $uploader4->getFilePath();
//        $image5_url = $uploader5->getFilePath();

        //create an instance of the house model class
        $house = new House();

        //set the house object property value with the respective
        //setters

        $house->setOwnedBy($_POST['owned_by']);
        $house->setHouseCategory($_POST['house_category']);
        $house->setLocation($_POST['location']);
        $house->setMinPrice($_POST['min_price']);
        $house->setMaxPrice($_POST['max_price']);
        $house->setImageOne(null);
        $house->setImageTwo(null);
        $house->setImageThree(null);
        $house->setImageFour(null);
        $house->setImageFive(null);
        $house->setStatus('available');


        //create an instance for the house controller

        $houseCtrl = new HouseController();
        $created = $houseCtrl->create($house);
        print_r($house);
        if ($created === TRUE) {
            $successMsg .= "House Added successfully";
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
            <div class="col-lg-6 col-md-offset-2">
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
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" class="form-control" required>

                                <label for="min_price">Price from</label>
                                <input type="number" id="min_price" name="min_price" class="form-control" required>



                                <label for="max_price">Max Price</label>
                                <input type="number" id="max_price" name="max_price" class="form-control" required>
                                <br>
<!--                                <label for="image1">Photo </label>-->
<!--                                <input type="file" name="image1" id="image1" class="form-control" required>-->
<!--<!--                                <label for="image2">Photo 2</label>-->
<!--                                <input type="file" name="image2" id="image2" class="form-control" required>-->
<!--                                <label for="image3">Photo 3</label>-->
<!--                                <input type="file" name="image3" id="image3" class="form-control" required>-->
<!--                                <label for="image4">Photo 4</label>-->
<!--                                <input type="file" name="image4" id="image4" class="form-control" required>-->
<!--                                <label for="image5">Photo 5</label>-->
<!--                                <input type="file" name="image5" id="image5" class="form-control" required>-->
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
        </div>
    </div>

    <?php include_once 'footer.php' ?>

</body>
</html>

