<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 25/09/17
 * Time: 11:00
 */

require_once '../../vendor/autoload.php';
use App\Controllers\HouseController;
$houses = HouseController::all();
$counter = 1;

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
                <h1 class="page-header">Houses</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registered Houses
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if (sizeof($houses)> 0 && !isset($houses['error'])) :?>
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                   id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>House Type</th>
                                    <th>Location</th>
                                    <th>Min Price</th>
                                    <th>Max Price</th>
                                    <th>Status</th>
                                    <th colspan="1">Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($houses as $house): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $counter++ ?></td>
                                        <td><?php echo $house['house_category']; ?></td>
                                        <td><?php echo $house['location']; ?></td>
                                        <td><?php echo $house['min_price']; ?></td>
                                        <td><?php echo $house['max_price']; ?></td>
                                        <td><?php echo $house['status']; ?></td>
                                        <td>
                                            <button class="btn btn-danger" onclick="deleteHouse('<?php echo $house['id'] ?>')"> Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                            <div class="alert alert-info">
                                No records!
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"  id="confirmTitle">Confirm Action</h4>
                </div>
                <div class="modal-body" id="confirmFeedback">
                    Are you sure you want to delete this House
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button"  id='btnConfirmDelete' class="btn btn-danger">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        <
        <!-- /.modal -->
    </div>

    <?php include_once 'footer.php' ?>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
    <script>
        function deleteHouse(id) {
            $('#confirmTitle').text('Delete House');
            $('#confirmDeleteModal').modal('show');
            var url = 'house_endpoint.php';
            $('#btnConfirmDelete').on('click', function (e) {
                e.preventDefault;
                $.ajax(
                    {
                        type: 'DELETE',
                        url: url,
                        data: JSON.stringify({'id': id}),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        success: function (response) {
                            if (response['statusCode'] == 200) {
                                $('#confirmFeedback').removeClass('alert alert-danger')
                                    .addClass('alert alert-success')
                                    .text(response.message);
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            }
                            if (response.statusCode == 500) {
                                $('#confirmFeedback').removeClass('alert alert-success')
                                    .html('<div class="alert alert-danger alert-dismissable">' +
                                        '<a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>' +
                                        '<strong>Error! </strong> ' + response.message + '</div>')

                            }
                        }
                    }
                )
            });
        }
        </script>

</body>
</html>
