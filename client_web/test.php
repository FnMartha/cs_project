<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 11/5/17
 * Time: 12:13 PM
 */

require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\HouseController;
use App\Controllers\UserController;
$houses = HouseController::all();


print_r(UserController::getId(27));