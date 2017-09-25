<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 25/09/17
 * Time: 09:18
 */
require_once __DIR__. '/../../vendor/autoload.php';
use App\Controllers\UserController;
use App\Models\User;

$errorMsg = '';
$successMsg = '';
if(isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['email'])  && isset($_POST['account_type'])
        && isset($_POST['password'])  && isset($_POST['confirm_password']) && isset($_POST['phone_number'])
    ) {

        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        $user->setAccountType($_POST['account_type']);
        $user->setPhoneNumber($_POST['phone_number']);
        if ($_POST['password'] == $_POST['confirm_password']) {
            $user->setPassword($_POST['confirm_password']);

            print_r($user);
            $userCtrl = new UserController();
            $created = $userCtrl->create($user);

            if ($created) {
                $successMsg .= "User Registered Successfully";
            }else{
                $errorMsg .= $created['error'];
            }
        } else {
            $errorMsg .= 'Password do not match try again';

        }

    } else {
        $errorMsg .= "All fields required";
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
                <h1 class="page-header">Create User Account</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Register User
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php
                        if ($successMsg != '' and $errorMsg == ''){
                            ?>
                            <div class="aler alert-success">
                                <?php echo $successMsg; ?>
                                <br>
                                <a href="users.php" class="btn-link">Go to users list</a>
                            </div>
                        <?php
                        }
                        else{
                            ?>
                            <div class="alert alert-danger">
                                <?php  echo $errorMsg?>
                            </div>
                        <?php
                        }
                        ?>
                      <div class="form-group">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?php echo isset($_POST['username'])? $_POST['username'] : '' ?>" class="form-control" required>

                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : '' ?>" class="form-control" required>

                            <label for="account_type">AccountType</label>
                            <select id="account_type" name="account_type" class="form-control">
                                <option value="client">Client</option>
                                <option value="owner">House Owner</option>
                                <option value="agent">Agent</option>
                                <option value="admin">Admin</option>
                            </select>

                            <label for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" value="<?php echo isset($_POST['phone_number'])? $_POST['phone_number'] : '' ?>" class="form-control" required>

                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" value="<?php echo isset($_POST['password'])? $_POST['password'] : '' ?>" class="form-control" required>

                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" value="<?php echo isset($_POST['confirm_password'])? $_POST['confirm_password'] : '' ?>" class="form-control" required>
                            <input type="submit" class="btn btn-primary" name="submit" value="Create Account" style="margin-top: 10px;">

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
