<?php
session_start();
require_once __DIR__.'/../vendor/autoload.php';
$response = "";
    // Reads the variables sent via POST from our gateway
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];
    if ( $text == "" ) {
        $houses = \App\Controllers\HouseController::all();
        // This is the first request. Note how we start the response with CON
        $response  = "CON Available Houses \n";
        foreach ($houses as $house):
        $response .= "{$house['id']} {$house['house_category']} @ {$house['max_price']}\n";
        endforeach;
    }


    header('Content-type: text/plain');
    echo $response;
    // DONE!!!
    ?>