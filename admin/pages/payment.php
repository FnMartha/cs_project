<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 13/06/2017
 * Time: 08:27
 */

require_once '../../vendor/autoload.php';
use \App\Controller\UserController;
use \App\Controller\PaymentController;
$payments = PaymentController::showMpesaPayments();
$counter=1;


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payments</title>

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
    <?php include_once 'right_menu.php'?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Payments</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <?php if(!isset($payments['error']) > 0){?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Recorded Payments
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MpesaCode</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date Paid</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($payments as $payment): ?>
                                    <tr class="odd gradeX">

                                        <td><?php echo $counter++ ?></td>
                                        <td><?php echo $payment['mpesaCode']?></td>

                                        <td><?php echo UserController::getId($payment['userId'])['fullName'] ;?></td>
<!--                                        <td>--><?php //echo $payment['paymentMethod'];?><!--</td>-->
                                        <td><?php echo $payment['phoneNumber'];?></td>
                                        <td><?php echo UserController::getId($payment['userId'])['email'];?></td>
                                        <td><?php echo $payment['txnDate'];?></td>

                                        <td>
                                            <button  class="btn btn-xs btn-success" id="btnApprove" onclick="showConfirmModal('<?php echo $payment['id']?>','<?php echo $payment['userId']?>', '<?php echo $payment['phoneNumber'] ?>')">Approve</button>
                                        </td>


                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php }
                else{
                    echo "No Pending Payments ";
                } ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4 (Confirm)-->
<div class="modal fade" id="confirm" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="modal-title">Confirm Approve Payment</h4>
                <div id="confirmFeedback">

                </div>
            </div>

            <div class="modal-body">
                <p style="font-size: 16px;"> Click Continue to Confirm Action</p>
            </div>
            <div class="modal-footer">
                <button type="button" id='btnConfirm' class="btn btn-info">Continue</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--end-->
    <?php include_once 'footer.php'?>
<!--<script src="../../public/assets/js/jquery.js"></script>-->
    <script>
        $(document).ready(function (e) {
            e.preventDefault;

        });
    </script>

    <script>
        function showConfirmModal(id, userId, phoneNumber) {
            $('#confirm').modal('show');
            var url = 'approve_mpesa_endpoint.php';
            $('#btnConfirm').on('click', function (e) {
                console.log({id:id, phoneNumber:phoneNumber});
                e.preventDefault;
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: JSON.stringify({id:id, phoneNumber:phoneNumber, userId: userId}),
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8;',
                    success: function (response) {
                        console.log(response);
                        if (response.statusCode == 200) {
                            console.log(response);
                            $('#confirmFeedback').removeClass('alert alert-danger')
                                .addClass('alert alert-success')
                                .text(response.message);
                            setTimeout(function () {
                                window.location.href = 'payment.php';
                            }, 1000);
                        }
                        if (response.statusCode == 500) {
                            $('#confirmFeedback').removeClass('alert alert-success')
                                .html('<div class="alert alert-danger alert-dismissable">' +
                                    '<a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>' +
                                    '<strong>Error! </strong> ' + response.message + '</div>')

                        }

                    },
                    error: function (error) {
                        console.log(error);
                    }

                });
            })
        }
    </script>
</body>
</html>
