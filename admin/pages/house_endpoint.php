<?php
/**
 * Created by PhpStorm.
 * User: njerucyrus
 * Date: 25/09/17
 * Time: 18:27
 */
require_once __DIR__.'/../../vendor/autoload.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
use App\Controllers\HouseController;
$data = json_decode(file_get_contents('php://input'), true);
if($requestMethod == 'DELETE'){
    $deleted = HouseController::delete($data['id']);
    if($deleted){
        print_r(json_encode(array(
            "statusCode"=>200,
            "message"=>"House Deleted"
        )));
    }else{
        print_r(json_encode(array(
            "statusCode"=>500,
            "message"=>"Server not found please try again later"
        )));
    }
}